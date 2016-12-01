<?php
    if(!($db = mysqli_connect("127.0.0.1", "magners", "", "usuarios", 3306))) // conexion base de datos
        die("Error: No se pudo conectar");
        
    $user = $_POST["login_username"];
    $pass = $_POST["login_password"];
    $query = "SELECT * FROM usuarios WHERE username = '$user'"; // consulta
    $res = mysqli_query($db, $query);
    if(!$res)
        die("Error en la consulta");
        
    if (mysqli_num_rows($res)==0)
    {
        $message = "El usuario no existe, ¿Deseas crearlo ahora?";
        echo "<script type='text/javascript'>
        var yes = confirm('$message');
        if (yes) {
            window.location = 'htmlregister.html';}
        else {
            window.location = 'htmlmain.html';}
        </script>";
    }
    else
    {
        $row = mysqli_fetch_assoc($res);
        if($row["password"] == $pass)
        {
            session_start();
            $_SESSION["username"] = $user;
            $_SESSION["password"] = $pass;
            $_SESSION["email"] = $row["email"];
            $_SESSION["premium"] = $row["premium"];
            header('Location: generarpregunta.php');
        }
        else
        {
            $message = "Contraseña y/o usuario incorectos";
            echo "<script type='text/javascript'>
            alert('$message');
            window.location = 'htmlmain.html';
            </script>";
        }
    }
?>