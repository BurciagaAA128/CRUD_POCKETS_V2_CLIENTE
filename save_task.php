<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $nombre = $_POST['nombre'];
  $edad = $_POST['edad'];
  $genero = $_POST['genero'];
  $telefono = $_POST['telefono'];
  $direccion = $_POST['direccion'];
  $contrasena = $_POST['contrasena'];
  $correo = $_POST['correo'];

  $query = "INSERT INTO cliente(nombre, edad, genero, telefono, direccion, contrasena, correo) VALUES ('$nombre', '$edad', '$genero', '$telefono', '$direccion', '$contrasena', '$correo')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Se ha guardado con exito';
  $_SESSION['message_type'] = 'error';
  header('Location: index.php');

}

?>
