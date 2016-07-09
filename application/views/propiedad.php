
<script src="http://maps.google.com/maps/api/js" 
type="text/javascript"></script>

<h1 class="text-center">INFORMACIÓN DE LA PROPIEDAD</h1>
<div class="col-md-6 col-sm-12 col-xs-12">
  <h2>Imagenes Propiedad</h2>

  <div class="carousel slide article-slide" id="article-photo-carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner cont-slider">
      <?php 
      foreach ($fotos as $key => $value) {
        if ($key == 0) {
          echo '<div class="item active">';
          echo '<img alt="" title="" width="600" class="center-block"  src="'.base_url().$value['url'].'">';
          echo '</div>';
        }else
        {
          echo '<div class="item">';
          echo '<img alt="" title="" class="center-block" width="600"  src="'.base_url().$value['url'].'">';
          echo '</div>';
        }
      } 
      ?>
    </div>
    <!-- Indicators -->
    <ol class="carousel-indicators center-block">
      <?php 
      foreach ($fotos as $key => $value) {
        echo '<li class="active"  data-slide-to="'.$key.'" data-target="#article-photo-carousel">';
        echo '<img alt=""  src="'.base_url().$value['url'].'">';
        echo '</li>';
      }
      ?>

    </ol>
  </div>
</div>
<div class="col-md-6 col-sm-12 col-xs-12">
  <div class="col-md-10 col-md-push-1">
    <h2><?=$titulo;?></h2>
    <h5><?=$descripcion_propiedad?></h5>
    <table class="table table-striped">
      <tr>
        <th>Id Propiedad</th>
        <td><?=$idPropiedad;?></td>
      </tr>
      <tr>
        <th>Sector</th>
        <td><?=$sector;?></td>
      </tr>
      <tr>
        <th>Comuna</th>
        <td><?=$comuna_nombre;?></td>
      </tr>
      <tr>
        <th>Región</th>
        <td><?=$nombre_region;?></td>
      </tr>
      <tr>
        <th>Tipo</th>
        <td><?=$descripcion_tipo;?></td>
      </tr>
      <tr>
        <th>Mts. Construídos:</th>
        <td><?=$metrosConstruidos;?></td>
      </tr>
      <tr>
        <th>Mts. Terreno</th>
        <td><?=$metrosTerreno;?></td>
      </tr>
      <tr>
        <th>Dormitorios</th>
        <td><?=$dormitorios;?></td>
      </tr>
      <tr>
        <th>Baños</th>
        <td><?=$baño;?></td>
      </tr>
      <tr>
        <th>Estacionamiento</th>
        <td><?=$estacionamiento;?></td>
      </tr>
      <tr>
        <th>Servicios</th>
        <td><?=$idPropiedad;?></td>
      </tr>
      <tr>
        <th>Precio</th>
        <td><?=$valor_publicado;?> UF</td>
      </tr>
      <tr>
        <th>Tipo de Operación</th>
        <td><?=$descripcion_transaccion;?></td>
      </tr>
    </table>
    <h2>Valor Pesos $ <?=$valor_pesos;?></h2>
    <h4>Ejecutivo: <?=$usuario['nombre']." ".$usuario['apellido'];?></h4>
    <h4>Contacto</h4>
    <h5>Email: <?=$usuario['correo']." Teléfono: ".$usuario['telefono']?></h5>
    <button type="button" class="btn btn-primary btn-block" style="margin-bottom:15px;" data-toggle="modal" data-target="#myModal">
      Quiero más Información
    </button>
  </div>

</div>
<div id="map" style="width: 100%; height: 400px;"></div>
<script type="text/javascript">
  var locations = [
  ['Excelente ubicación', <?=$ubicacion['latitud'];?>, <?=$ubicacion['longitud'];?>, 1],

  ];

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 17,
    center: new google.maps.LatLng(<?=$ubicacion['latitud'];?>, <?=$ubicacion['longitud'];?>),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  var infowindow = new google.maps.InfoWindow();

  var marker, i;

  for (i = 0; i < locations.length; i++) {  
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
      map: map
    });

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infowindow.setContent(locations[i][0]);
        infowindow.open(map, marker);
      }
    })(marker, i));
  }
</script>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ingrese sus datos y pronto lo contactaramos</h4>
      </div>
      <form class="form-horizontal" action="<?=base_url()?>/index.php/sistema/ingresar_solicitud" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label class="col-md-4 control-label" for="Nombre">Nombre</label>  
            <div class="col-md-6">
              <input id="Nombre" name="nombre" type="text" placeholder="Nombre" class="form-control input-md" required="">
            </div>
            </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Teléfono">Télefono</label>  
            <div class="col-md-6">
              <input id="Teléfono" name="tel" type="tel" placeholder="Teléfono" class="form-control input-md" required="">
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Correo">Correo</label>  
            <div class="col-md-6">
              <input id="Correo" name="mail" type="email" placeholder="Correo" class="form-control input-md" required="">
            </div>
          </div>
          <!-- Textarea -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Horario">Horario</label>
            <div class="col-md-6">                     
              <select class="form-control" name="msj">
                <option value="9-12">9-12</option>
                <option value="13-14">13-14</option>
                <option value="15-18<">15-18</option>
                <option value="19-21">19-21</option>
              </select>
            </div>
          </div>
        </div>
        <input type="hidden" name="id_propiedad" value="<?=$idPropiedad?>">
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">Quiero ser contáctado</button>
        </div>
      </form>
    </div>
  </div>
</div>
