<?php
    session_start();
    require '../connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groov Store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
</head>
<body>
    <div v-if="ok" id="topbar" class="topbar">
        <?php
            echo '<topbar id_user="'.$_SESSION['id_user'].'" username="'.$_SESSION['username'].'" tipo_usuario="'.$_SESSION['tipo_usuario'].'"></topbar>'
        ?>
    </div>
    <div id="articulo-container" class="container d-flex justify-content-center flex-column">
        <?php
            if(!isset($_COOKIE['articulos'])){
                echo 'Sin artículos para comprar aún';
            }else{
                $galletas = $_COOKIE['articulos'];
                $idArticulo = explode(',',$galletas);
                foreach ($idArticulo as $ar) {
                    $sql = "SELECT * FROM items WHERE id_item='$ar'";
                    $result = $conn->query($sql);
                    if(!$result){
                        echo 'Error '.$conn->error;
                    }else{
                        while($row = $result->fetch_assoc()){
                            echo '<articulo articulo_precio="'.$row['precio_unidad'].'" articulo_nombre="'.$row['nombre_producto'].'" articulo_img="'.$row['img_url'].'"></articulo>';
                        }
                    }
                }
            }

        ?>
    </div>
    <hr>
    <div class="container">
        <span>Total a pagar: </span>
        <form action="/pagar" method="post">
            <button class="btn btn-success" type="button">Pagar</button>
        </form>
    </div>
    <script src="groov-function.js"></script>
    <script src="carrito.js"></script>
</body>
</html>