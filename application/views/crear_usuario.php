<div class="col-md-8 col-md-push-2">
<form method="POST" action="<?=base_url();?>index.php/sistema/crear_usuario">
  <div class="form-group">
    <label for="exampleInputEmail1">RUN</label>
    <input type="text" class="form-control" id="exampleInputEmail1" required name="run" placeholder="Ingrese Campo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
	<input type="text" class="form-control" id="exampleInputEmail1"  required name="nombre" placeholder="Ingrese Campo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Apellido</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  required name="apellido" placeholder="Ingrese Campo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Contraseña</label>
    <input type="password" class="form-control" id="exampleInputEmail1"  required name="pass" placeholder="Ingrese Campo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Vuelva a ingresar Contraseña</label>
    <input type="password" class="form-control" id="exampleInputEmail1"  required name="pass2" placeholder="Ingrese Campo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Correo</label>
    <input type="email" class="form-control" id="exampleInputEmail1"  required name="correo" placeholder="Ingrese Campo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Teléfono</label>
    <input type="tel" class="form-control" id="exampleInputEmail1"  required name="telefono" placeholder="Ingrese Campo">
  </div>
  
  <button type="submit" class="btn btn-lg btn-default center-block">Enviar</button>

</form>
</div>