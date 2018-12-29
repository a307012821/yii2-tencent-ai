<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/28
 * Time: 16:53
 */
namespace TencentAi\core;

class Authentication extends Base{


    /**
     * @param $params
     * @param Enterprise $enterprise
     * @return string
     * 根据接口请求参数和应用秘钥计算请求签名
     */
    public function getReqSign($params, Enterprise $enterprise){
        $params["app_id"] = $enterprise->app_id;
        ksort($params);
        $str = '';
        foreach ($params as $key => $value) {
            if ($value !== '') {
                $str .= $key . '=' . urlencode($value) . '&';
            }
        }
        $str .= 'app_key=' . $enterprise->app_key;
        $sign = strtoupper(md5($str));
        return $sign;
    }

}