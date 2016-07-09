<div class="col-md-12">
	<h3>Lista de Usuarios</h3>
	<div class="col-md-3 col-md-push-9" style="margin-bottom:20px;">
		<a href="<?=base_url()?>/index.php/sistema/create_user"><input type="button" class="btn btn-block" value="Agregar Usuario" /></a>
	</div>
	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Rut</th>
			<th>Teléfono</th>
			<th>Correo</th>
			<th>Acción</th>
		</tr>

		<?php 
		foreach ($usuarios as $key => $value) { ?>

			<tr>
			<td><?=$value['idUsuario']?></td>
			<td><?=$value['nombre']." ".$value['apellido']?></td>
			<td><?=$value['rut']?></td>
			<td><?=$value['telefono']?></td>
			<td><?=$value['correo']?></td>

			<td>
			<div class="col-md-12"><div class="col-md-12">
			<form action="<?=base_url();?>/index.php/sistema/borrar_usuario" method="POST">
			<input type="hidden" name="id" value="<?=$value['idUsuario'];?>" >
			<input type="submit" class="btn btn-danger btn-block" value="Eliminar">
			</form>
			</div><div class="col-md-12">
			<form action="<?=base_url();?>/index.php/sistema/editar_usuario" method="POST">
			<input type="hidden" name="id" value="<?=$value['idUsuario'];?>" >
			<input type="submit" class="btn btn-danger btn-block" value="Modificar">
			</form
			></div></div></td>
		</tr>
		<?php } ?>
		
	</table>
</div>