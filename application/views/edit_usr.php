<div class="col-md-8 col-md-push-2">
<form method="POST" action="<?=base_url();?>index.php/sistema/e_usr">
<input type="hidden" name="id" value="<?=$usr['idUsuario']?>">
<input type="hidden" name="cl" value="<?=$usr['clave']?>">
  <div class="form-group">
    <label for="exampleInputEmail1">RUN</label>
    <input type="text" class="form-control" id="exampleInputEmail1" required name="run" value="<?=$usr['rut'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
	<input type="text" class="form-control" id="exampleInputEmail1"  required name="nombre" value="<?=$usr['nombre']?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Apellido</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  required name="apellido" value="<?=$usr['apellido']?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Contraseña</label>
    <input type="password" class="form-control" id="exampleInputEmail1"  required name="pass" value="<?=$usr['clave']?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Vuelva a ingresar Contraseña</label>
    <input type="password" class="form-control" id="exampleInputEmail1"  required name="pass2" value="<?=$usr['clave']?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Correo</label>
    <input type="email" class="form-control" id="exampleInputEmail1"  required name="correo" value="<?=$usr['correo']?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Teléfono</label>
    <input type="tel" class="form-control" id="exampleInputEmail1"  required name="telefono" value="<?=$usr['telefono']?>" >
  </div>
  
  <button type="submit" class="btn btn-lg btn-default center-block">Enviar</button>

</form>
</div>