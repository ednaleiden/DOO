<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
  <title>Multiusuarios : Niveles de logistica</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="../js/jquery-1.12.4-jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../style.css">
  <style type="text/css">
    .login-form {
      width: 340px;
      margin: 20px auto;
    }

    .login-form form {
      margin-bottom: 15px;
      background: #f7f7f7;
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      padding: 30px;
    }

    .login-form h2 {
      margin: 0 0 15px;
    }

    .form-control,
    .btn {
      min-height: 38px;
      border-radius: 2px;
    }

    .btn {
      font-size: 15px;
      font-weight: bold;
    }

    h1 {
      color: #f7f7f7;
    }

    h3 {
      color: #f7f7f7;
    }

    h4 {
      color: #f7f7f7;
    }

    a {
      color: #f7f7f7;
      text-decoration: none;
    }
  </style>
</head>

<body>

  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
      <h5 class="text-white h4">Perfil de Logistica</h5>
      <ul>
        <li> <span class="text-muted"><a href="usuarios_portada.php">Stock</a></span></li>
        <br>
        <li><a href="../cerrar_sesion.php"><button class="btn btn-danger text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar Sesion</button></a></li>
      </ul>

    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
  <div class="wrapper">

    <div class="container">

      <div class="col-lg-12">

        <center>
          <h1>Pagina logistica</h1>

          <h3>
            <?php

            session_start();

            if (!isset($_SESSION['logistica_login'])) {
              header("location: ../index.php");
            }

            if (isset($_SESSION['admin_login'])) {
              header("location: ../admin/admin_portada.php");
            }

            if (isset($_SESSION['vendedor_login'])) {
              header("location: ../vendedor/personal_portada.php");
            }

            if (isset($_SESSION['logistica_login'])) {
            ?>
              Bienvenidos,
            <?php
              echo $_SESSION['logistica_login'];
            }
            ?>
          </h3>
        </center>

      </div>



    </div>
    <div align="center" class="container-fluid my-3">
      <?php include("../conex.php") ?>
      <div class="container p-4">
        <div class="row">
          <div class="col-md-4">


            <?php if (isset($_SESSION['message'])) { ?>
              <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

            <?php session_unset();
            } ?>

            <div class="card card-body ">
              <form action="save.php" method="GET">
                <div class="from-group">
                  <input type="number" name="cantidad" class="form-control" placeholder="Cantidad" autofocus>
                </div>
                <div class="from-group mt-3">
                  <input type="text" name="producto" class="form-control" placeholder="Producto" autofocus>
                </div>
                <!--<div class="from-group mt-3">
               <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion de la categoria"></textarea>
            </div>-->
                <input type="submit" class="btn btn-success btn-block mt-3" name="save" value="Agregar">
              </form>
            </div>
          </div>

          <div class="col-md-8 ">
            <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th>ID Producto</th>
                  <th>Cantidad</th>
                  <th>Producto</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM logistica";
                $result_logistic =  mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result_logistic)) { ?>
                  <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['cantidad'] ?></td>
                    <td><?php echo $row['producto'] ?></td>
                    <td>
                      <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                          <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                        </svg></a>
                      <a href="delete.php? id=<?php echo $row['id'] ?>" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                          <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                        </svg></a>
                    </td>
                  </tr>
                <?php } ?>


              </tbody>
            </table>
            <!--<?php
                $busqueda;
                if (isset($_GET['enviar'])) {
                  $busqueda = $_GET['busqueda'];
                  $consulta = $conn->query("SELECT * FROM logistica WHERE id LIKE '%$busqueda%' OR producto LIKE '%$busqueda%' OR id LIKE '%$busqueda%'");

                  while ($row = $consulta->fetch_array()) { ?>

          <table class="table table-light table-striped">
            <thead>   
              <tr>
                <th>ID categoria</th>
                <th>Nombre</th>
                <th>Descripción</th>
              </tr>
            </thead>
            <tbody>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['cantidad'] ?></td>
              <td><?php echo $row['producto'] ?></td>
            </tbody>
          </table>
        <?php }
                }
        ?>-->
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>

  </div>

</body>

</html>