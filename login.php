<?php
session_start();
require './connection.php';

$username = $_POST['username'];
$password = crypt($_POST['password'],'sha');

$loginSQL = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";

$result = $conn->query($loginSQL);

if(!$result){
    die('error '.$conn->error);
}

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $_SESSION['activo'] = 1;
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellido'] = $row['apellido'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['tipo_usuario'] = $row['tipo_usuario'];

        if($_SESSION['tipo_usuario'] == 'admin'){
            header('Location: public/menu.php');
        }else{
            header('Location: public/store.php');
        }
    }
    
}else{
    header('Location: login.html?err=1');
}
