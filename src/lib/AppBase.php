<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/28
 * Time: 17:37
 */
namespace TencentAi\lib;

use TencentAi\core\Authentication;
use TencentAi\core\Base;
use TencentAi\core\Enterprise;
use TencentAi\core\Request;

class AppBase extends Base {

    /**
     * @var Enterprise
     * 企业对象
     */
    public $enterprise;

    /**
     * @var
     * 企业配置信息
     */
    public $config;

    /**
     * @var
     * 调用接口的最终配置（即生成签名）
     */
    public $final_config;

    public function __construct($config){
        $this->config = $config;
        $this->enterprise = new Enterprise($config);
    }

    /**
     * @return string
     * 获取签名
     */
    public function getSign(){
        $authentication = new Authentication();
        return $authentication->getReqSign($this->final_config,$this->enterprise);
    }

    /**
     * @param $params
     * @return array
     * 生成最终的配置信息
     */
    public function generateFinalConfig($params){
        $this->final_config["app_id"] = $this->enterprise->app_id;
        $this->final_config["time_stamp"] = strval(time() + 60 *5);
        $this->final_config["nonce_str"] = uniqid();
        $this->final_config = array_merge($this->final_config , $params);
        $this->final_config["sign"] = $this->getSign();
        return $this->final_config;
    }


    public function http_post($url){
        $result = Request::post($url , $this->final_config);
        return json_decode($result,true);
    }


}