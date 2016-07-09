<div class="col-md-4 col-md-push-4">
<form method="POST" action="<?=base_url();?>index.php/sistema/editar_tipo">
  <div class="form-group">
    <label for="exampleInputEmail1">Descripcion</label>
    <input type="hidden" value="<?=$tipo['idTipo']?>" name="id">
    <input type="text" class="form-control" id="exampleInputEmail1" value="<?=$tipo['descripcion']?>" required name="nombre" placeholder="Ingrese Campo">
  </div>
  <button type="submit" class="btn btn-default">Modificar</button>
</form>
</div>