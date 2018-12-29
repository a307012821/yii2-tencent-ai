# yii2-tencent-ai

腾讯语音AI接口 语音翻译

composer require a307012821/yii2-tencent-ai dev-master

###example


#####$base = file_get_contents("./source/3.mp3");
#####$base = base64_encode($base);
#####$app = App::SpeechRecognition([
#####            "app_id"  => "",
#####            "app_key" => ""
#####        ]);
#####$result = $app->translate([
##########            'format'       => '8',
#####            'seq'          => '0',
#####            'end'          => '1',
#####           'session_id'   => 'test1',
#####            'speech_chunk' => $base,
#####            'source'       => 'zh',
#####            'target'       => 'zh',
#####]);        
