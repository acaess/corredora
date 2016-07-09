<div class="col-md-6 col-md-push-3">
<h4>Ahora suba las imagenes de la propiedad</h4>
<?php echo form_open_multipart('sistema/subir_foto');?>
	<input type="hidden" value="<?=$pro[0]['idPropiedad']?>" name="id">
	<div class="form-group">
    <label for="exampleInputFile">Foto1</label>
    <input type="file" name='userfile' id="exampleInputFile" size="10">
    <p class="help-block">Foto 1</p>
  </div>
  
  <!--<div class="form-group">
    <label for="exampleInputFile">Foto2</label>
    <input type="file" name='userfile' id="exampleInputFile" size="10">
    <p class="help-block">Foto 2</p>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Foto1</label>
    <input type="file" name='userfile' id="exampleInputFile" size="10">
    <p class="help-block">Foto 3</p>
  </div>-->
  <?php echo "<input type='submit' name='submit' value='upload' /> ";?>
  <?php echo "</form>"?>
</div>