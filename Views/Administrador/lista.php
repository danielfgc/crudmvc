<header>
      <nav class='navbar navbar-expand justify-content-between'>
        <div class='container-fluid'>
          <a class='navbar-brand' href='#'>
            <img src='https://t2.uc.ltmcdn.com/images/0/3/2/img_como_alejarse_de_una_persona_toxica_45230_600.jpg' alt='Avatar Logo' style='width:70px;' class='rounded-pill'> 
          </a>
        </div>
        <div class='container-fluid'>
          <a class='navbar-brand' href='#'>Gestor de Usuarios</a>

        </div>
          
            <div class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                Bienvenid@ Admin
              </a>
              <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                <li><a class='dropdown-item' href='#'>Ver Perfil</a></li>
                <li><a class='dropdown-item' href='#'>Editar Perfil</a></li>
                <li><hr class='dropdown-divider'></li>
                <li><a class='dropdown-item' href='#'>Cerrar Sesión</a></li>
              </ul>
            </div>
      
      </nav>
    </header>
    <main class='container'>
 
      <section class='container m-5 bg-white'>          
        <table class='table table-striped '>
          <thead>
            <tr>
              <th>Foto</th>
              <th>Usuario</th>
              <th>Email</th>
              <th>Rol</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $consulta = Db::getConnect()->query('call selectAll()');

              foreach($consulta->fetchAll() as $fila){
                ($fila[4]==1)? $rol = 'Administrador':$rol = 'Usuario';
                echo "            <tr>
                <td><img src='".$fila[3]."' alt='foto de ".$fila[1]."' class='img-fluid rounded-pill' width='70px'> </td>
                <td>".$fila[1]."</td>
                <td>".$fila[2]."</td>
                <td>".$rol."</td>
                <td><a href='?controller=administrador&action=ficha&id=".$fila[0]."' class='editar'>Editar Perfil</a></td>
                <td>
                  <a href='#'><i class='fas fa-trash-alt' id='eliminar' data-bs-toggle='modal' data-bs-target='#staticBackdrop'></i></a>
                  <!-- Modal -->
                  <div class='modal fade' id='staticBackdrop' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <h5 class='modal-title' id='exampleModalLabel'>Modal title</h5>
                          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                          Desea Continuar
                        </div>
                        <div class='modal-footer'>
                          <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Salir</button>
                          <a href='?controller=administrador&action=ficha&id=".$fila[0]."'><button type='button' class='btn btn-danger'>Eliminar</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>";
              }
            ?>

            
          </tbody>
        </table>
      </section>
    </main>