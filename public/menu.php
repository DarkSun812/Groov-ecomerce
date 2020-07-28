<?php
session_start();
require '../connection.php';
$saveSession = $_COOKIE['PHPSESSID'];
$idUser = $_SESSION['id_user'];
$isSessionSet = isset($idUser);
$conn->query("UPDATE usuarios SET `session`='$saveSession' WHERE `id_user`='$idUser'");

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
    <div id="menu" class="container d-flex justify-content-between">
        <div class="opciones-user">
            <h2>Usuarios</h2>
            <form action="" name="menu_usuarios" method="POST">
                <div class="form-group">
                    <label for="id_usuario">ID del usuario</label><br>
                    <?php
                    if(isset($_POST['id_user'])){
                        echo '<input id="id_user" class="form-control" type="text" name="id_user" value="'.$_POST['id_user'].'" required>';
                    }else{
                        echo '<input id="id_user" class="form-control" type="text" name="id_user" value="" required>';
                    }
                    
                    ?>
                    <input class="form-control btn btn-primary" type="submit" name="buscar_usuario" value="Buscar usuario">
                </div>
                <?php
                    if(isset($_POST['buscar_usuario'])){
                        $id = $_POST['id_user'];
                        $result = $conn->query("SELECT * FROM usuarios WHERE id_user='$id'");
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo '
                                <input-menu nombre="Nombre" valor="'.$row['nombre'].'"></input-menu>
                                <input-menu nombre="Apellido" valor="'.$row['apellido'].'"></input-menu>
                                <input-menu nombre="Email" valor="'.$row['email'].'"></input-menu>
                                <input-menu nombre="Usuario" valor="'.$row['username'].'"></input-menu>
                                <input-menu nombre="Tipo de Usuario" valor="'.$row['tipo_usuario'].'"></input-menu>
                                <input type="submit" class="form-control btn btn-warning" name="modificar_usuario" value="Modificar">
                                <button onclick="confirmDelete(this.form)" type="submit" class="form-control btn btn-danger" name="eliminar_usuario"></button>

                                ';
                            }
                        }else{
                            echo '
                                <input-menu nombre="Nombre" valor=""></input-menu>
                                <input-menu nombre="Apellido" valor=""></input-menu>
                                <input-menu nombre="Email" valor=""></input-menu>
                                <input-menu nombre="Usuario" valor=""></input-menu>
                                <input-menu nombre="Password" valor=""></input-menu>
                                <input-menu nombre="Tipo" valor=""></input-menu>
                                <input type="submit" class="form-control btn btn-success" name="registar_usuario" value="Registrar nuevo usuario">
                                ';
                        }
                    }
                    if(isset($_POST['modificar_usuario'])){
                        $upId = $_POST['id_user'];
                        $upNombre = $_POST['Nombre'];
                        $upApellido = $_POST['Apellido'];
                        $upEmail = $_POST['Email'];
                        $upUsuario = $_POST['Usuario'];
                        $upTipo = $_POST['Tipo'];
                        $updateSQL = "UPDATE usuarios SET id_user='$upId', nombre='$upNombre', apellido='$upApellido', email='$upEmail' tipo_usuario='$upTipo'";
                        
                        $upResult = $conn->query($updateSQL);

                        if($upResult){
                            echo '<script>alert("Datos Actualizados")</script>';
                        }else{
                            echo 'Error '.$conn->error;
                        }
                    }

                    if(isset($_POST['eliminar_usuario'])){
                        $delId = $_POST['id_user'];
                        $delSQL = "DELETE FROM usuarios WHERE id_user='$delId'";
                        $conn->query($delSQL);

                    }

                    if(isset($_POST['registar_usuario'])){
                        $newId = $_POST['id_user'];
                        $newNombre = $_POST['Nombre'];
                        $newApellido = $_POST['Apellido'];
                        $newEmail = $_POST['Email'];
                        $newUsuario = $_POST['Usuario'];
                        $newPassword = $_POST['Password'];
                        $newTipo = $_POST['Tipo'];
                        $newSQL = "INSERT INTO usuarios (id_user,nombre,apellido,email,username,password,tipo_usuario) 
                        VALUES ('$newId','$newNombre','$newApellido','$newEmail','$newUsuario','$newPassword','$newTipo')";

                        if(!$conn->query($newSQL)){
                            echo 'Error '.$conn->error;
                        } else{
                            echo '<script>alert("Datos Registrados")</script>';
                        }
                    }
                ?>
            </form>
        </div>
        <div class="opciones-item"> 
            <h2>Productos</h2>
        </div>
    </div>
    <script src="groov-function.js"></script>
    <script>
        function confirmDelete(form){
                    let confirmar = confirm('¿Desea eliminar el registro?');
                    if(confirmar){
                        form.submit();
                    }
                }
        const Menu = new Vue({
            el: '#menu',
        })
    </script>
</body>
</html>
