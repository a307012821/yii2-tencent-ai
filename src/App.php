<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/28
 * Time: 17:07
 */
namespace TencentAi\src;

use TencentAi\core\Base;


/**
 * Class Drive
 * @package common\service\we_chat
 * @method  static \TencentAi\lib\SpeechRecognition  SpeechRecognition($config)
 */
class App extends Base{

    /**
     * @param $name
     * @param array $config
     * @return mixed
     * @throws \ReflectionException
     */
    static private function engine($name ,array $config) {
        $class = new \ReflectionClass(self::class);
        $namespace = $class->getNamespaceName();
        $drive = $namespace . "\\" . $name;
        return new $drive($config);
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     * @throws \ReflectionException
     */
    static public function __callStatic($name, $arguments){
        return self::engine($name , ...$arguments);
    }

}