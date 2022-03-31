<?php
  if(!isset($_COOKIE['rol']) || $_COOKIE['rol']==2){
    header('Refresh:0, url=index.php');
  }
  $conexion1 =Db::getConnect();
  $consulta1= $conexion1->query("call fichaUser('".$_COOKIE['usuario']."');");
  foreach($consulta1->fetchAll() as $user){
    $id = $user[0];
    $username = $user[1];
    $email = $user[2];
    $contraseña = $user[3];
    $urlfoto = $user[4];
    $pregunta = $user[5];
    $respuesta = $user[6];
    $idrol = $user[7];
  }
  $consulta1->closeCursor();
  ?>
<header>
      <nav class='navbar navbar-expand justify-content-between'>
        <div class='container-fluid'>
          <a class='navbar-brand' href='#'>
            <img src='<?php echo $urlfoto;?>' alt='Avatar Logo' style='width:70px;' class='rounded-pill'> 
          </a>
        </div>
        <div class='container-fluid'>
          <a class='navbar-brand' href='#'>Gestor de Usuarios</a>

        </div>
          
            <div class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                Bienvenid@ <?php echo $_COOKIE['usuario'];?>
              </a>
              <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
              <li><a class="dropdown-item" href="?controller=administrador&action=lista">Ver lista</a></li>
                    <li><a class="dropdown-item" href="?controller=administrador&action=ficha&username=<?php echo $username;?>">Ver Perfil</a></li>
                    <li><a class="dropdown-item" href="?controller=administrador&action=editar&username=<?php echo $username;?>">Editar Perfil</a></li>
                <li><hr class='dropdown-divider'></li>
                <li><a class='dropdown-item' href='index.php?controller=administrador&action=cerrarsesion'>Cerrar Sesión</a></li>
              </ul>
            </div>
      
      </nav>
    </header>
    <main class='container'>
 
      <section class='container m-md-5 bg-white'>          
        <table class='table table-striped '>
          <thead>
            <tr>
              <th>Foto</th>
              <th>Usuario</th>
              <th>Email</th>
              <th>Rol</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            
              $consulta = Db::getConnect()->query('call selectAll()');

              foreach($consulta->fetchAll() as $fila){
                ($fila[4]==1)? $rol = 'Administrador':$rol = 'Usuario';
                echo " <tr>
                <td><img src='".$fila[3]."' alt='foto de ".$fila[1]."' class='img-fluid rounded-pill' width='70px' height='70px'> </td>
                <td>".$fila[1]."</td>
                <td>".$fila[2]."</td>
                <td>".$rol."</td>
                <td><a href='?controller=administrador&action=ficha&username=".$fila[1]."'>Editar Perfil</a></td>";
                if($fila[4] == 2){
                echo "<td><a href='#' id='adelete' data-bs-toggle='modal' data-bs-target='#staticBackdrop".$fila[0]."'>Eliminar</a></td>
                  <div class='modal fade' id='staticBackdrop".$fila[0]."' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <h5 class='modal-title' id='exampleModalLabel'>Está a punto de eliminar a ".$fila[1]."</h5>
                          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                          ¿Desea Continuar?
                        </div>
                        <div class='modal-footer'>
                          <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Salir</button>
                          <a href='?controller=administrador&action=eliminar&id=".$fila[0]."'><button type='button' class='btn btn-danger'>Eliminar</button></a>
                        </div>
                      </div>
                    </div>
                  </div>";
                }
               
              echo "</tr>";
              }
            ?>

            
          </tbody>
        </table>
      </section>
    </main>