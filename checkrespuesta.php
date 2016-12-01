<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RESPUESTA</title>
</head>
<body bgcolor=#FFEEAA>
    <?php
    session_start();
    $correcta = $_SESSION["correcta"];
    $ans = $_POST["ans"];
    
    if($ans==$correcta)
    {
        echo "<h1>¡RESPUESTA CORRECTA!</h1>";
    }
    else
    {
        echo "<h1>RESPUESTA INCORRECTA</h1>";
    }
    ?>
    
    <form action="generarpregunta.php" method="POST">
        <input type="submit" value="Nueva pregunta"><br><br>
        <input type="submit" formaction="exit.php" value="DEJAR DE JUGAR">
    </form>
</body>
</html>