<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PREGUNTA</title>
</head>
<body bgcolor=#FFEEAA>
    <?php
    if(!($db = mysqli_connect("127.0.0.1", "magners", "", "preguntas", 3306)))
        die("Error: No se pudo conectar");
    
    $num = rand(1,3);
    $query = "SELECT * FROM pool WHERE id = $num";
    $res = mysqli_query($db, $query);
    if(!($res))
        die("Error en la consulta");
    
    $row = mysqli_fetch_assoc($res);
    $pregunta = $row["pregunta"];
    
    session_start();
    
    switch(rand(0,3))
    {
        case 0: $r1 = $row["rescor"]; $r2 = $row["res2"]; $r3 = $row["res3"]; $r4 = $row["res4"]; $_SESSION["correcta"] = "r1"; break;
        case 1: $r1 = $row["res2"]; $r2 = $row["rescor"]; $r3 = $row["res3"]; $r4 = $row["res4"]; $_SESSION["correcta"] = "r2"; break;
        case 2: $r1 = $row["res2"]; $r2 = $row["res3"]; $r3 = $row["rescor"]; $r4 = $row["res4"]; $_SESSION["correcta"] = "r3"; break;
        case 3: $r1 = $row["res2"]; $r2 = $row["res3"]; $r3 = $row["res4"]; $r4 = $row["rescor"]; $_SESSION["correcta"] = "r4"; break;
        default: echo "ERROR CON EL RANDOMIZE DE LAS PREGUNTAS";
    }
    echo "<h1>".$pregunta."</h1>";
    ?>
    <form action="checkrespuesta.php" method="POST">
        <input type="radio" name="ans" value="r1"><?php echo $r1; ?><br>
        <input type="radio" name="ans" value="r2"><?php echo $r2; ?><br>
        <input type="radio" name="ans" value="r3"><?php echo $r3; ?><br>
        <input type="radio" name="ans" value="r4"><?php echo $r4; ?><br>
        <input type="submit" value="ENVIAR RESPUESTA"><br><br>
        <input type="submit" formaction="exit.php" value="DEJAR DE JUGAR">
    </form>
</body>
</html>