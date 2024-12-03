<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Tienda de Libros</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="Contacto.php">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Fonts CSS-->
    </head>
    <body id="image-top">
          <nav class="navbar navbar-expand-lg bg-warning fixed-top" id="mainNav">
            <div class="container"><a class="navbar-brand js-scroll-trigger" href="#page-top">Registro de Asistencia</a>
                    <button 
                         class="navbar-toggler navbar-toggler-right font-weight-bold bg-warning text-white rounded" 
                         type="button" 
                         data-bs-toggle="offcanvas" 
                         data-bs-target="#offcanvasMenu" 
                         aria-controls="offcanvasMenu" 
                         aria-expanded="false" 
                         aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                         <ul class="navbar-nav ml-auto">
					     <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="Autor.php">Historial</a>
                              </li>
                              <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Modificar</a>
                              </li>
                         </ul>
                    </div> 
               </div>
          </nav>
          
          <!-- Barra lateral desplegable -->
          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
               <div class="offcanvas-header" >
                    <h5 class="offcanvas-title" id="offcanvasMenuLabel">Menu</5>
                    <button type="buttom" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
               </div>
               <div class="offcanvas-body">
                    <ul class="list-group">
                         <li class="list-group-item"><a href="#" class="text-decoration-none">Inicio</a></li>
                         <li class="list-group-item"><a href="#" class="text-decoration-none">Historial</a></li>
                         <li class="list-group-item"><a href="#" class="text-decoration-none">Modificar</a></li>
                    </ul>
               </div>
          </div>

          <header>
               <section>
                    <div class= "container mb-16">
                         <h1 class="text-center mb-4"> Sistema de Registro</h1>
                         <!-- Mensajes -->
                         <?php if (isset($success)) : ?>
                              <div class="alert alert-success"><?php echo $success; ?></div>
                         <?php elseif (isset($error)) : ?>
                              <div class="alert alert-danger"><?php echo $error; ?></div>
                         <?php endif; ?>
                    </div>
                    <!-- Formulario de Registro -->
                    <div class="card mb-4">
                         <div class="card header bg-dark text-white">Registrar Estudiantes</div>
                              <div class="card-body">
                                   <form method="POST">
                                        <div class="mb-3">
                                             <label for="Nombre" class="form-label">ID del Estudiante</label>
                                             <input type="text" class="form-control" id="id_estudiante" name="id_estudiante" required>
                                        </div>
                                        <button type="submit" class="btn btn-warning">Registrar</button>
                                   </form>
                              </div>
                         </div>

                         <!--Tabla de Estudiantes -->
                         <div class="card mb-4">
                              <div class="card header bg-dark text-white">Listado de Estudiantes</div>
                              <div class="card-body">
                                   <table class="table table-striped">
                                        <thead>
                                             <tr>
                                                  <th>#</th>
                                                  <th>Nombre</th>
                                                  <th>ID del Estudiante</th>
                                             </tr>
                                        </thead>
                                   </table>
                                   <tbody>
                                        <?php if ($result && $result->num_rows > 0) : ?>
                                             <?php while ($row = $result->fetch_assoc()) : ?>
                                                  <tr>
                                                       <td><?php echo $row['Id']; ?></td>
                                                       <td><?php echo $row['Nombre']; ?></td>
                                                       <td><?php echo $row['IdEstudiante']; ?></td>
                                                  </tr>
                                             <?php endwhile; ?>
                                        <?php else : ?>
                                             <tr>
                                                  <td colspan="3" class="text-center">No hay Estudiante Registrado.</td>
                                             </tr>
                                        <?php endif; ?>
                                   </tbody>
                              </div>
                         </div>
                    </div>
               </section>
          </header>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootsrap.bundle.min.js"></script>
    </body>
</html>