<?php
header('Content-Type: text/html; charset=utf-8');
ini_set('max_execution_time', 3000);

function debug($data){
    echo '<pre>' . print_r($data, true) . '</pre>';
}

function preg($data){
    $regex = '|(.*?)---|';
    preg_match($regex, $data, $matches);
    return $matches[1];
}

function size($data){
    $size = getimagesize($data);
    echo $size[0] . "<br>";
    return $size;
}

function pickPhotos(){
    $links = explode("\r\n", $_POST['links']);
    $names = explode("\r\n", $_POST['names']);

    for($i = 0; $i < count($links); $i++){
        $path = 'img/'  . $names[$i] . substr($links[$i], -4);
       // $path = mb_convert_encoding($path, 'UTF-8');

        file_put_contents($path,  file_get_contents($links[$i]));
    }




   $scanPhotos = scandir('img');
   unset($scanPhotos[0], $scanPhotos[1]);
   //debug($scanPhotos);


    foreach ($scanPhotos as $item) {
        $noChange = $item;
        $short = preg($item);
      //  echo $noChange . '<br>';
      //  echo $short . '<br>';

        if(file_exists("fold/$short")){
            copy("img/$noChange", "fold/$short/$noChange");
        }else{
            mkdir("fold/$short", 0777, true);
            copy("img/$noChange", "fold/$short/$noChange");
        }
   }

}

