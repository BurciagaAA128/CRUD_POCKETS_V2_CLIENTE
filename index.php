<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <h1>Tabla clientes</h1>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">

          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="nombre" autofocus>
          </div>

          <div class="form-group">
            <input type="number" name="edad" class="form-control" placeholder="edad" autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="genero" class="form-control" placeholder="genero" autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="telefono" class="form-control" placeholder="telefono" autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="direccion" class="form-control" placeholder="direccion" autofocus>
          </div>

          <div class="form-group">
            <input type="password" name="contrasena" class="form-control" placeholder="contrasena" autofocus>
          </div>

          <div class="form-group">
            <input type="email" name="correo" class="form-control" placeholder="correo" autofocus>
          </div>


          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Agregar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Genero</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Contraseña</th>
            <th>Correo</th>
            <th>Operaciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM cliente";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['edad']; ?></td>
            <td><?php echo $row['genero']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
            <td><?php echo $row['contrasena']; ?></td>
            <td><?php echo $row['correo']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
