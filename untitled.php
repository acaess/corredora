<div class="col-md-12">
	<h3>Lista de Usuarios</h3>
	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Cargo</th>
			<th>Rut</th>
			<th>Acción</th>
		</tr>

		<?php 
		foreach ($usuarios as $key => $value) { ?>

			<tr>
			<td>Nombre</td>
			<td>Cargo</td>
			<td>Rut</td>
			<td>Acción</td>
			<td>
			<div class="col-md-12"><div class="col-md-12">
			<form action="<?=base_url();?>/index.php/sistema/borrarPropiedad" method="POST">
			<input type="hidden" name="id" value="<?=$value['idPropiedad'];?>" >
			<input type="submit" class="btn btn-danger btn-block" value="Eliminar">
			</form>
			</div><div class="col-md-12">
			<form action="<?=base_url();?>/index.php/sistema/editarPropiedad" method="POST">
			<input type="hidden" name="id" value="<?=$value['idPropiedad'];?>" >
			<input type="submit" class="btn btn-danger btn-block" value="Modificar">
			</form
			></div></div></td>
		</tr>
		<?php } ?>
		
	</table>
</div>