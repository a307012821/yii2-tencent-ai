<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/28
 * Time: 16:03
 */
namespace TencentAi\core;

class Base{

    public $option = [];


    public function __set($name, $value){
        $this->option[$name] = $value;
    }

    public function __get($name){
        if (isset($this->option[$name])) {
            return $this->option[$name];
        }
        return null;
    }

}