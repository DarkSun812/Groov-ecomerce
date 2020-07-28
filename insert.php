<?php

require './connection.php';

$jsonData = file_get_contents('img/ropa.json');
$data = json_decode($jsonData,true);

$pantalones = $data['pantalones'];
$camisas = $data['camisas'];
$ropa = array_merge($pantalones,$camisas);
sort($ropa);



foreach($ropa as $row => $value){
    $sql = "UPDATE items SET `img_url`='$ropa[$row]' WHERE `id_item`=$row";
    if(!$conn->query($sql)){
        die('error '.$conn->error);
    }
}



echo 'Datos registrados';