<div class="col-md-8 col-md-push-2">
<form method="POST" action="<?=base_url();?>index.php/sistema/editarPropiedad">
    <input type="hidden" name="id" value="<?=$idPropiedad?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Título</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="titulo" value="<?=$titulo?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descripción</label>
	<textarea class="form-control" name="descripcion" rows="4" ><?=$descripcion?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Sector</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="sector" value="<?=$sector?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Dirección</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="direccion" value="<?=$direccion?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Comuna</label>
    <select class="form-control" required name="com">
  <option>Seleccione</option>
  <?php
  foreach ($comuna as $key => $value) {
    if ($value['idComuna'] == $Comuna_idComuna) {
      echo '<option selected value="'.$value["idComuna"].'">'.$value["descripcion"].'</option>';
    }else{
  	echo '<option value="'.$value["idComuna"].'">'.$value["descripcion"].'</option>';
  }
  }
  ?>
</select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Metros Construidos</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="metrosc" value="<?=$metrosConstruidos?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Metros Terreno</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="metrost" value="<?=$metrosTerreno?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Baños</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="banios" value="<?=$baño?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Dormitorios</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="dormitorios" value="<?=$dormitorios?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Estacionamientos</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="estac" value="<?=$estacionamiento?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Valor Real</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="valor" value="<?=$valor?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Valor Publicado</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="valor_publicado" value="<?=$valor_publicado?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Tipo de Propiedad</label>
    <select class="form-control" required name="tipo">
  <option>Seleccione</option>
  <?php
  foreach ($tipos as $key => $value) {
  	if ($value['idTipo']==$Tipo_idTipo) {
            echo '<option selected value="'.$value['idTipo'].'">'.$value["descripcion"].'</option>';

    }else{
      echo '<option value="'.$value['idTipo'].'">'.$value["descripcion"].'</option>';
    }
  }
  ?>
 
</select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Tipo de Transacción</label>
    <select class="form-control" required name="tras">
  <option>Seleccione</option>
  <?php
  foreach ($transaccion as $key => $value) {
    if ($value['idTransaccion'] == $Transaccion) {
      echo '<option selected value="'.$value['idTransaccion'].'">'.$value["descripcion"].'</option>';
    }else
    {
      echo '<option value="'.$value['idTransaccion'].'">'.$value["descripcion"].'</option>';
    }
  }
  ?>
 
</select>
  </div>
  <button type="submit" class="btn btn-lg btn-default center-block">Enviar</button>
</form>
</div>