<div class="col-md-12">
	<h3>Notificaciones</h3>
	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Teléfono</th>
			<th>Correo</th>
			<th>Horario</th>
			<th>Hora Solicitud</th>
			<th>Propiedad</th>
			<th>Estado</th>
		</tr>

		<?php 
		foreach ($notificacion as $key => $value) { ?>

			<tr>
			<td><?=$value['idConsulta']?></td>
			<td><?=$value['nombre']?></td>
			<td><?=$value['telefono']?></td>
			<td><?=$value['mail']?></td>
			<td><?=$value['mensaje']?></td>
			<td><?=$value['hora']?></td>
			<td><a href="<?=base_url()?>/index.php/inicio/propiedad/<?=$value['idPropiedad']?>" target="_blank">Ver</a></td>
			<td>
			<form action="<?=base_url();?>/index.php/sistema/getionar" method="POST">
			<input type="hidden" value="<?=$value['idConsulta']?>" name="id">
			<?php if ($value['estado'] == 0) {
			echo '<input type="submit" class="btn btn-danger btn-block" value="Gestionar">';
			}else{ echo "Gestionado";}
			?>
			</form>
			</td>
		</tr>
		<?php } ?>
		
	</table>
</div>