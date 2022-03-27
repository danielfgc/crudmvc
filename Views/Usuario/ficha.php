<?php
  $consulta=Db::getConnect()->query("call fichaUser(".$_COOKIE['username'].")");
  foreach($consulta->fetchAll() as $user){
    $id = $user[0];
    $username = $user[1];
    $email = $user[2];
    $contraseña = $user[3];
    $urlfoto = $user[4];
    $pregunta = $user[5];
    $respuesta = $user[6];
    $idrol = $user[7];
    $bonfoto = $user[8];
  }
?>


<header>
        <nav class="navbar navbar-expand justify-content-between">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                <img src="https://t2.uc.ltmcdn.com/images/0/3/2/img_como_alejarse_de_una_persona_toxica_45230_600.jpg" alt="Avatar Logo" style="width:70px;" class="rounded-pill"> 
              </a>
            </div>
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Gestionar Perfil</a>
    
            </div>
              
                <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Bienvenid@ <?php echo $username;?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Ver Perfil</a></li>
                    <li><a class="dropdown-item" href="#">Editar Perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                  </ul>
                </div>
          
          </nav> 
    </header>
    <main class="container mt-5">
        <section class="container d-flex justify-content-center p-5">
            <div class="card" style="width: 18rem;">
                <img src="<?php $foto?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">@<?php $username;?></h5>
                  <p class="card-text"><?php $email;?></p>
                  <div>
                    <a href="#"><button class="btn editar">Editar Perfil</button></a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Eliminar
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Desea Continuar
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                            <button type="button" class="btn btn-danger">Eliminar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                </div>
              </div>
        </section>
    </main>