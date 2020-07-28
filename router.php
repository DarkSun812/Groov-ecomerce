<?php

// echo __DIR__.'\index.html';
$requests = $_SERVER['REQUEST_URI'];
$cpath = "/groovecomerce";

switch ($requests) {
    case $cpath . '/':
        header('Location: ' . $cpath . '/public/index.php');
        die();
        break;
    case $cpath . '/public/register':
        header('Location: ' . $cpath . '/public/register.html');
        die();
        break;
    case $cpath . '/public/store':
        if (isset($_SESSION)) {
            header('Location: ' . $cpath . '/public/login.html');
            die();
        } else {
            header('Location: ' . $cpath . '/public/store.php');
            die();
        }
        break;
    case $cpath . '/public/login':
        header('Location: ' . $cpath . '/public/login.html');
        die();
        break;
    case $cpath . '/logout':
        header('Location: ' . $cpath . '/logout.php');
        die();
        break;
    case $cpath . '/public/carrito':
        header('Location: ' . $cpath . '/public/carrito.php');
        die();
        break;
    default:
        header('Location: ' . $cpath . '/public/index.php');
        die();
        break;
}
