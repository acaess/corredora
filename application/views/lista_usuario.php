<div class="col-md-12">
	<h3>Lista de Propiedades</h3>
	<div class="col-md-3 col-md-push-9" style="margin-bottom:20px;">
		<a href="<?=base_url()?>/index.php/sistema/admin_propiedad"><input type="button" class="btn btn-block" value="Agregar Propiedad" /></a>
	</div>
	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>Foto</th>
			<th>Descripción</th>
			<th>Valor (UF)</th>
			<th>Valor Propiedad (UF)</th>
			<th>Operación</th>
			<th>Fecha Publicación</th>
			<th>Acción</th>
		</tr>

		<?php 
		foreach ($propiedad as $key => $value) { ?>

			<tr>
			<td><?=$value['idPropiedad'];?></td>
			<td><img src="<?=base_url().$value['fotos'][0]['url']?>" height="100" widht="200"/></td>
			<td><?="Titulo: ".$value['titulo']." Sector: ".$value['sector']." Descripción: ".$value['desprop'];?></td>
			<td><?=$value['valor_publicado'];?></td>
			<td><?=$value['valor'];?></td>
			<td><?=$value['destran']?></td>
			<td><?=$value['fecha']?></td>
			<td><div class="col-md-12"><div class="col-md-12">
			<form action="<?=base_url();?>/index.php/sistema/borrarPropiedad" method="POST">
			<input type="hidden" name="id" value="<?=$value['idPropiedad'];?>" >
			<input type="submit" class="btn btn-danger btn-block" value="Eliminar">
			</form>
			</div><div class="col-md-12">
			<form action="<?=base_url();?>/index.php/sistema/edicion_propiedad" method="POST">
			<input type="hidden" name="id" value="<?=$value['idPropiedad'];?>" >
			<input type="submit" class="btn btn-danger btn-block" value="Modificar">
			</form
			></div></div></td>
		</tr>
		<?php } ?>
		
	</table>
</div>