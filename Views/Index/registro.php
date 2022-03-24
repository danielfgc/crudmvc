<div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
    
    <form action="../registro.php" method="post">
      <div class="form-outline mb-4">
        <label class="form-label" for="nuevousuario">Nombre de usuario</label>
        <input type="text" id="nuevousuario" name="nuevousuario" class="form-control" onkeyup="verificarUsuario('../../assets/async/validar.php')"/>
        <div id="destino"></div>
      </div>
      <div class="form-outline mb-4">
        <label class="form-label" for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" />
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
      <div id="erregister"></div>
      <button type="submit" class="btn btn-primary btn-block " id="registrame" name="registrame">Regístrame</button>
    </form>
  </div>
</div>
</section>
</main>
