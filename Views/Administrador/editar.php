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
?>


<header>
        <nav class="navbar navbar-expand justify-content-between">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                <img src="<?php echo $fotadmin;?>" alt="Avatar Logo" style="width:70px;" class="rounded-pill"> 
              </a>
            </div>
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Editar Perfil</a>
    
            </div>
              
                <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Bienvenid@ <?php echo $_COOKIE['usuario'];?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="?controller=administrador&action=lista">Ver lista</a></li>
                    <li><a class="dropdown-item" href="?controller=administrador&action=ficha&username=<?php echo $nombreadmin;?>">Ver Perfil</a></li>
                    <li><a class="dropdown-item" href="?controller=administrador&action=editar&username=<?php echo $nombreadmin;?>">Editar Perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="index.php?controller=administrador&action=cerrarsesion">Cerrar Sesión</a></li>
                  </ul>
                </div>
          
          </nav> 
    </header>
    <main class="container mt-5">
        <section class="container container col-md-4">

            <div class="form-outline mb-4">
              <label class="form-label" for="nuevousuario">Nombre de usuario</label>
              <input type="text" id="nuevousuario" name="nuevousuario" class="form-control" placeholder="<?php echo $username;?>" />
            </div>
      
            <div class="form-outline mb-4">
              <label class="form-label" for="email">Email</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="<?php echo $email;?>" />
            </div>
            <div class="form-outline mb-4">
              <label for="rol">Rol</label>
              <select class="form-select" aria-label="Default select example" id="rol">
                <?php
                  if($idrol != 1){
                    echo"<option value='1'>Administrador</option>
                    <option selected value='2'>Usuario</option>";
                  }else{
                    echo"<option selected value='1'>Administrador</option>";                    
                  }
                ?>

              </select>
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="foto">Foto de Perfil</label>
              <input type="text" id="urlfoto" name="urlfoto" class="form-control" placeholder="Suba un archivo o adjunte aquí su enlace"/>
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="pregunta">Pregunta Secreta</label>
              <select class="form-select mb-3" id="pregunta" name="pregunta" aria-label="Default select example">
                <?php
                if($pregunta == 'Nombre de tu mascota'){
                  echo "<option value='Nombre de tu mascota' selected>Nombre de tu mascota</option>
                  <option value='Nombre de tu mejor amigo de la infancia'>Nombre de tu mejor amigo de la infancia</option>
                  <option value='Deporte favorito'>Deporte favorito</option>";
                }elseif($pregunta == 'Nombre de tu mejor amigo de la infancia'){
                  echo "<option value='Nombre de tu mascota'>Nombre de tu mascota</option>
                  <option value='Nombre de tu mejor amigo de la infancia' selected>Nombre de tu mejor amigo de la infancia</option>
                  <option value='Deporte favorito'>Deporte favorito</option>";   
                }else{
                  echo "<option value='Nombre de tu mascota'>Nombre de tu mascota</option>
                  <option value='Nombre de tu mejor amigo de la infancia'>Nombre de tu mejor amigo de la infancia</option>
                  <option value='Deporte favorito' selected>Deporte favorito</option>"; 
                }
                ?>
              </select>
              <input type="text" id="iduser" name="iduser" value="<?php echo $id;?>" class="form-control" hidden/>
              <label class="form-label" for="respuesta">Respuesta Secreta</label>
              <input type="text" id="respuesta" name="respuesta" class="form-control"/>
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="nuevacontraseña" >Contraseña</label>
              <input type="password" id="nuevacontraseña" name="nuevacontraseña" class="form-control" />
            </div>
      
            <div class="form-outline mb-4">
              <label class="form-label" for="repetircontraseña">Repita la contraseña</label>
              <input type="password" id="repetircontraseña" name="repetircontraseña" class="form-control" />
            </div>
            <div id="errupdate"></div>
            <button type="button" class="btn btn-primary btn-block editar" id="registrame" name="registrame" onclick="updateUsuario('assets/async/update.php')">Guardar Cambios</button>
            
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
        
        </section>
    </main>
 