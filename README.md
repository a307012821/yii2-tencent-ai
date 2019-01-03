# yii2-tencent-ai

Voice Translation of Tencent Voice AI Interface

    composer require a307012821/yii2-tencent-ai dev-master


### example

    $base = file_get_contents("./source/3.mp3");
    $base = base64_encode($base);
    $app = App::SpeechRecognition([
                "app_id"  => "",
                "app_key" => ""
            ]);
    $result = $app->translate([
                'format'       => '8',
                'seq'          => '0',
                'end'          => '1',
                'session_id'   => 'test1',
                'speech_chunk' => $base,
                'source'       => 'zh',
                'target'       => 'zh',
    ]);  
    
