<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/28
 * Time: 17:26
 */
namespace TencentAi\lib;

class SpeechRecognition extends AppBase implements InterfaceApp {

    const API = "https://api.ai.qq.com/fcgi-bin/nlp/nlp_speechtranslate";

    public function translate($params = []){
        $this->generateFinalConfig($params);
        return $this->http_post(self::API);
    }

}