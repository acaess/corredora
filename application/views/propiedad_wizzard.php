    <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />
    <link href="<?=base_url();?>/assets/css/style.css" rel="stylesheet" />

<div class="col-md-8 col-md-push-2">
<form method="POST" action="<?=base_url();?>index.php/sistema/subirPropiedad">
  <div class="form-group">
    <label for="exampleInputEmail1">Título</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="titulo" placeholder="Ingrese Campo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descripción</label>
	<textarea class="form-control" name="descripcion" rows="4" placeholder="Ingrese Descripcion de la propiedad"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Sector</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="sector" placeholder="Ingrese Campo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Dirección</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="direccion" placeholder="Ingrese Campo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Comuna</label>
    <select class="form-control" required name="com">
  <option>Seleccione</option>
  <?php
  foreach ($comuna as $key => $value) {
  	echo '<option value="'.$value["idComuna"].'">'.$value["descripcion"].'</option>';
  }
  ?>
</select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Metros Construidos</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="metrosc" placeholder="Ingrese Campo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Metros Terreno</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="metrost" placeholder="Ingrese Campo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Baños</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="banios" placeholder="Ingrese Campo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Dormitorios</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="dormitorios" placeholder="Ingrese Campo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Estacionamientos</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="estac" placeholder="Ingrese Campo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Valor Real</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="valor" placeholder="Ingrese Campo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Valor Publicado</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="valor_publicado" placeholder="Ingrese Campo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Tipo de Propiedad</label>
    <select class="form-control" required name="tipo">
  <option>Seleccione</option>
  <?php
  foreach ($tipos as $key => $value) {
  	echo '<option value="'.$value['idTipo'].'">'.$value["descripcion"].'</option>';
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
  	echo '<option value="'.$value['idTransaccion'].'">'.$value["descripcion"].'</option>';
  }
  ?>
</select>
  </div>

  <button type="submit" class="btn btn-lg btn-default center-block">Enviar</button>


  

</form>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery.knob.js"></script>
    <!-- jQuery File Upload Dependencies -->
    <script src="<?=base_url();?>assets/js/jquery.ui.widget.js"></script>
    <script src="<?=base_url();?>assets/js/jquery.iframe-transport.js"></script>
    <script src="<?=base_url();?>assets/js/jquery.fileupload.js"></script>
    <!-- Our main JS file -->
    <script src="<?=base_url();?>assets/js/script.js"></script>


    <!-- Only used for the demos. Please ignore and remove. --> 
