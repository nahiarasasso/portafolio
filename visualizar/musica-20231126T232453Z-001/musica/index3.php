<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style2.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style> 
 body {
    font-family: Arial, sans-serif;
    background: linear-gradient( rgba(36, 36, 36, 0.425), rgba(36, 36, 36, 0.47)), url("fondo cancion.webp");
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position: center;}

    .buttom {
      background-color: #9200d6;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 10px; 
      cursor: pointer;
      border-radius: 10px;
    }
    
    .buttom:hover {
      background-color: #3f2c05;
    }
  




</style>
<header>
        <a href="index.html" class="buttom">Volver a Inicio</a>
</header

<?php
    $conn = new mysqli("localhost", "root", "", "tp_final");

    $duracion = $_POST['duracion'];
    $año_composicion = $_POST['ano_composicion'];
    $genero = $_POST['genero'];
    $titulo = $_POST['titulo'];
    $url_cancion = $_POST['url_cancion'];
    $compositor = $_POST['compositor'];

    echo "<h2 style='color: white; font-size: 30px;'>Canciones</h2>";

    $sql = "INSERT INTO cancion (duracion, año_composicion, genero, titulo, url_cancion, compositor) VALUES ('$duracion', '$año_composicion', '$genero', '$titulo', '$url_cancion', '$compositor')";
    $conn->query($sql);

    $sql = "SELECT * FROM cancion";
    $resultado = $conn->query($sql);

    while ($fila = $resultado->fetch_assoc()) {
        $duracion = $fila['duracion'];
        $año_composicion = $fila['año_composicion'];
        $genero = $fila['genero'];
        $titulo = $fila['titulo'];
        $url_cancion = $fila['url_cancion'];
        $compositor = $fila['compositor'];

        echo "<div style='background-color: rgba(123, 118, 118, 0.5); padding: 60px; color: #fff; margin: 90px auto; width: 500px; border-radius: 10px; font-size: 26px;'>";
        echo "<p style='color: white; font-size: 20px; letter-spacing: -1px;'>DURACION: $duracion</p>";
        echo "<p style='color: white; font-size: 20px; letter-spacing: -1px;'>GENERO: $genero</p>";
        echo "<p style='color: white; font-size: 20px; letter-spacing: -1px;'>TITULO: $titulo</p>";
        echo "<p style='color: white; font-size: 20px; letter-spacing: -1px;'>COMPOSITOR: $compositor</p>";
        echo "<a href='$url_cancion'>Escuchar canción</a>";
        echo "</div>";
    }
?>

</body>
</html>