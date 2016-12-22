<?php
    if(!($db = mysqli_connect("127.0.0.1", "magners", "", "usuarios", 3306)))
        die("Error: No se pudo conectar");
        
    $user = $_POST["register_username"];
    $pass = $_POST["register_password"];
    $mail = $_POST["register_email"];

    $query = "SELECT * FROM usuarios WHERE username = '$user'";
    $res = mysqli_query($db, $query);
    if(!$res)
        die("Error en la consulta");
        
    if (mysqli_num_rows($res)!=0)
    {
        $message = "El nombre de usuario ya existe";
        echo "<script type='text/javascript'>
        alert('$message');
        window.location = '../../front_end/html/htmlregister.html';
        </script>";
    }
    else
    {
        $query = "INSERT INTO  `usuarios` (`username` , `password` , `email` , `premium`) VALUES ('$user',  '$pass',  '$mail', '0')";
        $res = mysqli_query($db, $query);
        if(!$res)
            die("Error al introducir los datos");
        else
        {
            require_once '../../libs/mail_lib.php';
            session_start();
            $_SESSION["username"] = $user;
            $_SESSION["password"] = $pass;
            $_SESSION["email"] = $mail;
            $_SESSION["premium"] = 0;
            $message = "Usuario creado con éxito - Recibirás un correo de confirmación en tu bandeja de entrada";
            send_confirmation_mail($mail);
            echo "<script type='text/javascript'>
            alert('$message');
            window.location = 'generarpregunta.php';
            </script>";
        }
    }
?>