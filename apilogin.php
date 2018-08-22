<?php
    $enlace = mysql_connect('localhost', 'root', '');
    if (!$enlace) {
        die('No se pudo conectar: ' . mysql_error());
    }
    if (!mysql_select_db('login')) {
        die('No se pudo seleccionar la base de datos: ' . mysql_error());
    }
    session_start();
    if(!empty($_SESSION["user_session"])){
        header("Location : index.html");
    }else{
        echo false;
    }

    $user_info = (isset($_POST["user_info"]))? $_POST["user_info"] : "";
    $user_info = json_decode($user_info,true)
    validate($user_info);

    function validate($user_info){
        $queryt = "SELECT * FROM usuarios WHERE email = '".$user_info['email']."'";
        $email_check = mysql_query($query);
        print_r($email_check);
        $resultado = mysql_fetch_assoc($email_check);
        if($resultado){
            if(password_verify($passwordUsuario, $resultado["password"])){
                $_SESSION["nombre"] = $resultado["nombre"];
              
            }else{
                print "Los datos han sido incorrectos!!<br> <a href = './'>Volver</a>";
            }
        }else{
            print "Usuario no registrado <br> <a href = './'>Volver</a>";
        }
    } 
