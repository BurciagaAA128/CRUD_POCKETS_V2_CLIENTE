<?php
include("db.php");
$nombre = '';
$edad= '';
$genero= '';
$telefono= '';
$direccion= '';
$contrasena= '';
$correo= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM cliente WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $edad = $row['edad'];
    $genero = $row['genero'];
    $telefono = $row['telefono'];
    $direccion = $row['direccion'];
    $contrasena = $row['contrasena'];
    $correo = $row['correo'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $edad = $_POST['edad'];
  $genero = $_POST['genero'];
  $telefono = $_POST['telefono'];
  $direccion = $_POST['direccion'];
  $contrasena = $_POST['contrasena'];
  $correo = $_POST['correo'];

  $query = "UPDATE cliente set nombre = '$nombre', edad = '$edad', genero = '$genero', telefono = '$telefono', direccion = '$direccion',contrasena = '$contrasena', correo = '$correo' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Se ha actualizado con exito';
  $_SESSION['message_type'] = 'error';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">

      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">

        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update nombre">
        </div>

        <div class="form-group">
          <input name="edad" type="number" class="form-control" value="<?php echo $edad; ?>" placeholder="Update edad">
        </div>

        <div class="form-group">
          <input name="genero" type="text" class="form-control" value="<?php echo $genero; ?>" placeholder="Update genero">
        </div>

        <div class="form-group">
          <input name="telefono" type="text" class="form-control" value="<?php echo $telefono; ?>" placeholder="Update telefono">
        </div>

        <div class="form-group">
          <input name="direccion" type="text" class="form-control" value="<?php echo $direccion; ?>" placeholder="Update direccion">
        </div>

        <div class="form-group">
          <input name="contrasena" type="text" class="form-control" value="<?php echo $contrasena; ?>" placeholder="Update contrasena">
        </div>

        <div class="form-group">
          <input name="correo" type="text" class="form-control" value="<?php echo $correo; ?>" placeholder="Update correo">
        </div>

        <button class="btn-success" name="update">Actualizar</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
