<header>
        <nav class="navbar navbar-expand justify-content-between">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                <img src="https://t2.uc.ltmcdn.com/images/0/3/2/img_como_alejarse_de_una_persona_toxica_45230_600.jpg" alt="Avatar Logo" style="width:70px;" class="rounded-pill"> 
              </a>
            </div>
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Editar Perfil</a>
    
            </div>
              
                <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Bienvenid@ Admin
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
        <section class="container container col-md-4">
          <form>

            <div class="form-outline mb-4">
              <label class="form-label" for="nuevousuario">Nombre de usuario</label>
              <input type="text" id="nuevousuario" name="nuevousuario" class="form-control" />
            </div>
      
            <div class="form-outline mb-4">
              <label class="form-label" for="email">Email</label>
              <input type="email" id="email" name="email" class="form-control" />
            </div>
            <div class="form-outline mb-4">
              <label for="rol">Rol</label>
              <select class="form-select" aria-label="Default select example">
                <option selected value=""> </option>
                <option value="Administrador">Administrador</option>
                <option value="Usuario">Usuario</option>
              </select>
            </div>
            <div class="form-outline mb-4 row">
              <label class="form-label" for="foto">Foto de Perfil</label>
              <div class="col">
              <input type="file" id="foto" name="foto" class="form-control" />
              </div>
              <p class="d-flex justify-content-center"> o </p>
              <div class="col">
              <input type="text" id="urlfoto" name="urlfoto" class="form-control" placeholder="Suba un archivo o adjunte aquí su enlace"/>
              </div>
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="pregunta">Pregunta Secreta</label>
              <select class="form-select mb-3" id="pregunta" name="pregunta" aria-label="Default select example">
                <option value="Nombre de tu mascota" selected>Nombre de tu mascota</option>
                <option value="Nombre de tu mejor amigo de la infancia">Nombre de tu mejor amigo de la infancia</option>
                <option value="Deporte favorito">Deporte favorito</option>
              </select>
              <label class="form-label" for="respuesta">Respuesta Secreta</label>
              <input type="text" id="respuesta" name="respuesta" class="form-control"/>
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="nuevacontraseña">Contraseña</label>
              <input type="password" id="nuevacontraseña" name="nuevacontraseña" class="form-control" />
            </div>
      
            <div class="form-outline mb-4">
              <label class="form-label" for="repetircontraseña">Repita la contraseña</label>
              <input type="password" id="repetircontraseña" name="repetircontraseña" class="form-control" />
            </div>
          
            <button type="submit" class="btn btn-primary btn-block boton" id="registrame" name="registrame">Guardar Cambios</button>
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
          </form>
        </section>
    </main>
 