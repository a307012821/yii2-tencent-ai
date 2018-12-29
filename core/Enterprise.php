<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/28
 * Time: 17:02
 */
namespace TencentAi\core;

class Enterprise extends Base{


    /**
     * @var
     * 应用标识
     */
    public $app_id;

    /**
     * @var
     * 应用秘钥
     */
    public $app_key;


    public function __construct($config =[]){
        $this->setAttr($config);
    }


    public function setAttr($config){
        foreach ($config as $key => $item){
            $this->$key = $item;
        }
    }

}