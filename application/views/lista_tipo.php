<div class="col-md-4 col-md-push-4">
  <h3>Lista de Tipo</h3>
  <div class="col-md-12" style="margin-bottom:20px;">
    <button type="button" class="btn btn-block" data-toggle="modal" data-target="#myModal">
  Agregar Tipo de Propiedad
</button>

    <!--<a href="<?=base_url()?>/index.php/sistema/crear_tipo">-->
    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Tipo de Propiedad</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url()?>/index.php/sistema/crear_tipo" method="post">
          <div class="form-group">
    <label for="exampleInputEmail1">Descripción</label>
    <input type="text" class="form-control" id="exampleInputEmail1" required name="des" placeholder="Descripción">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
      </div>
    </div>
  </div>
</div>
  </div>
  <table class="table table-bordered">
    <tr>
      <th>ID</th>
      <th>Descripción</th>
      <th>Acción</th>
    </tr>
    <?php 
    foreach ($tipos as $key => $value) { ?>

      <tr>
      <td><?=$value['idTipo']?></td>
      <td><?=$value['descripcion']?></td>
      <td>
      <div class="col-md-12"><div class="col-md-12">
      <form action="<?=base_url();?>/index.php/sistema/eliminar_tipo" method="POST">
      <input type="hidden" name="id" value="<?=$value['idTipo'];?>" >
      <input type="submit" class="btn btn-danger btn-block" value="Eliminar">
      </form>
      </div><div class="col-md-12">
      <form action="<?=base_url();?>/index.php/sistema/view_editar_tipo" method="POST">
      <input type="hidden" name="id" value="<?=$value['idTipo'];?>" >
      <input type="submit" class="btn btn-danger btn-block" value="Modificar">
      </form></div></div></td>
    </tr>
    <?php } ?>
    
  </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url();?>/assets/js/bootstrap.min.js"></script>