<?php
    session_start();
    // Captcha
    if(isset($_SESSION['img_number']) && $_SESSION['img_number'] === $_POST["respuesta"]) {
        // Loggearse
        $serv = 'localhost';
        $cuenta = 'root';
        $contra = '';
        $BaseD = 'beachbeer';

        // Conexion con la base de datos 
        $conexion = new mysqli($serv,$cuenta,$contra,$BaseD);

        if($conexion->connect_error){
            die('Ocurrio un error en la conexion con la BD');
        }
        else{

            if(isset($_SESSION['user'])){
                $_SESSION['aux'] = $_POST['username'];
                $aux = $_SESSION['user'];
                $_SESSION['user'] = $_POST['username'];

                //Iniciarlizar intentos del usuario anterior
                if($aux !== $_SESSION['aux']){
                    $sql = "UPDATE usuarios SET intentos=0 WHERE cuenta LIKE BINARY '$aux'";
                    $conexion->query($sql);
                }
            }
            else{
                $_SESSION['user'] = $_POST['username'];
                $_SESSION['aux'] = $_POST['username'];
            }

            $cuenta = $_POST['username'];    
            $password = $_POST['password'];


            // Encontrar el usuario en la BD
            $existe= "SELECT cuenta,contra,bloqueado FROM usuarios WHERE cuenta LIKE BINARY '$cuenta'";

            $existe = $conexion->query($existe);

            // Si encuentra al usuario
            if($conexion->affected_rows == 1){
                $fila = $existe->fetch_assoc();

                    // Valida si el usuario no esta bloqueado
                if($fila['bloqueado'] == 0){

                    // Contraseña Cifrada
                    $passwdEncript = $fila['contra'];   

                    //Comparar contraseña encriptada de la BD con la que ingresó en el form
                    if(password_verify("$password",$passwdEncript)){
                        // Loggearse
                        $sql = "UPDATE usuarios SET intentos=0 WHERE cuenta LIKE BINARY '$cuenta'";
                        $_SESSION['user'] = $cuenta;
                        $conexion->query($sql);

                        // Cookies
                        if($_POST["remember"] == "true") {
                            setcookie ("username",$_POST["username"],time()+ 3600);
                            setcookie ("password",$_POST["password"],time()+ 3600);
                        }
                        else {
                            setcookie("username","");
                            setcookie("password","");
                        }
                        if($cuenta=="ADMINISTRADOR") {
                            $_SESSION['ADMIN'] = "ADMIN";
                        }
                        echo "0";
                    }
                    else{
                        //Contraseña Incorrecta
                        session_destroy();
                        $sql = "SELECT intentos FROM usuarios WHERE cuenta LIKE BINARY '$cuenta'";
                        $result = $conexion->query($sql);

                        $fila = $result->fetch_assoc();

                        $cont = $fila['intentos'];
                        $cont++;

                        if($cont == 3) {
                            $sql = "UPDATE usuarios SET intentos=3,bloqueado=1 WHERE cuenta LIKE BINARY '$cuenta'";
                            $conexion->query($sql);
                            echo "1";
                        }
                        else {
                            $sql = "UPDATE usuarios SET intentos=$cont WHERE cuenta LIKE BINARY '$cuenta'";
                            $conexion->query($sql);
                            echo "2";
                        }
                    }
                }
                else{
                    //Usuario Bloqueado
                    session_destroy();
                    echo "3";
                }
            }
            else{ 
                // No existe Usuario
                session_destroy();
                echo "4";
            }
        }
    }
    else {
        // Captcha Incorrecto
        session_destroy();
        echo "5";
    }
?>