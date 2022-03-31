<?php
  if(!isset($_COOKIE['rol']) || $_COOKIE['rol']==2){
    header('Location: index.php');
  }
require_once('Connection.php');
 $conexion =Db::getConnect();
  $consulta= $conexion->query("call fichaUser('".$_GET['username']."');");
  foreach($consulta->fetchAll() as $user){
    $id = $user[0];
    $username = $user[1];
    $email = $user[2];
    $contraseña = $user[3];
    $urlfoto = $user[4];
    $pregunta = $user[5];
    $respuesta = $user[6];
    $idrol = $user[7];
  }
  $consulta->closeCursor();
  $consulta2= $conexion->query("call fichaUser('".$_COOKIE['usuario']."');");
  foreach($consulta2->fetchAll() as $user){
    $fotoadmin = $user[4];
    $nombreadmin = $user[1];
  }
  $consulta2->closeCursor();
?>


<header>
        <nav class="navbar navbar-expand justify-content-between">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                <img src="<?php echo $fotadmin;?>" alt="Avatar Logo" style="width:70px;" class="rounded-pill"> 
              </a>
            </div>
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Gestionar Perfil</a>
    
            </div>
              
                <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Bienvenid@ <?php echo $_COOKIE['usuario'];?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  
                    <li><a class="dropdown-item" href="?controller=administrador&action=ficha&username=<?php echo $nombreadmin;?>">Ver Perfil</a></li>
                    <li><a class="dropdown-item" href="?controller=administrador&action=editar&username=<?php echo $nombreadmin;?>">Editar Perfil</a></li>
                    <li><a class="dropdown-item" href="?controller=administrador&action=lista">Ver lista</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="index.php?controller=administrador&action=cerrarsesion">Cerrar Sesión</a></li>
                  </ul>
                </div>
          
          </nav> 
    </header>
    <main class="container mt-5">
        <div class="container d-flex justify-content-center p-5">
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $urlfoto;?>" class="card-img-top" alt="Foto de <?php echo $username;?>">
                <div class="card-body">
                  <h5 class="card-title">@<?php echo $username;?></h5>
                  <p class="card-text"><?php echo $email;?></p>
                  <div>
                    <a href="?controller=administrador&action=editar&username=<?php echo $username;?>"><button class="btn editar">Editar Perfil</button></a>
                    <?php
            if($idrol==2){
              
              echo '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Eliminar
            </button>
            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Estás a punto de eliminar a <?php echo $username;?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            ¿Desea Continuar?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                            <a href="?controller=administrador&action=eliminar&id=<?php echo $id;?>"><button type="button" class="btn btn-danger">Eliminar</button></a>
                          </div>
                        </div>
                      </div>
                    </div>';
            }
                    ?>
                </div>
                </div>
              </div>
          </div>
    </main