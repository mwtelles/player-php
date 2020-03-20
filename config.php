<?php

$config = (isset($_POST['config'])) ? $_POST['config'] : null;

if ($config != null) {

    if ($config['mode'] == 'CONCATENADO') {
        $config['videos'] = [];

        unlink('saida.mp4');
        exec("concat.bat");
        
        array_push(
                $config['videos'],

                [
                    'sources' =>
                    [
                        'src'  => 'saida.mp4',
                        'type' => "video/mp4"
                    ]
                ]
            );

    } else {
        unlink('saida.mp4');
        exec("concat.bat");
        $config['videos'] = [];

        $file_lines = file('videos/listaVideos.txt');

        foreach ($file_lines as $line) {
            array_push(
                $config['videos'],

                [
                    'sources' =>
                    [
                        'src'  => 'videos/'.str_replace("file ", "",$line),
                        'type' => "video/mp4"
                    ]
                ]
            );
        }
    }
}
echo json_encode($config);
