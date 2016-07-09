<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Corredora Propiedades</title>

    <!-- Bootstrap -->
    <link href="<?=base_url();?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>/assets/css/full-slider.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style type="text/css">
      .navbar-inverse{ 
          background-color: rgba(39, 174, 96,5.0);
          border-color: rgba(39, 174, 96,5.0); }
      .navbar-inverse .navbar-nav>li>a {color: #ecf0f1;}
      .navbar-inverse .navbar-nav>li>a:hover {color: #bdc3c7;}
      .navbar-inverse .navbar-brand {color: #ecf0f1;}
      footer{
        margin-top: 20px;
        margin-bottom: 0px;
      }
      </style>
  </head>
  <body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=base_url()?>">Corredora Propiedades</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#">Services</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
    
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <?php foreach ($pro as $key => $value): ?>
            <?php if ($key == 0): ?>
            <li data-target="#myCarousel" data-slide-to="<?=$key?>" class="active"></li>
            <?php else:?>
            <li data-target="#myCarousel" data-slide-to="<?=$key?>"></li>
            <?php endif ?>
        <?php endforeach ?>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
        <?php foreach ($pro as $key => $value): ?>
    <?php if ($key == 0): ?>
        <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?=base_url().$value['fotos'][0]['url']?>');"></div>
                <div class="carousel-caption">
                    <h2><?=$value['titulo']?></h2>
                    <h4><?=$value['descripcion']?></h4>
                    <h3><?=$value['valor_publicado']?>UF</h3>
                    <a href="<?=base_url().'index.php/inicio/propiedad/'.$value['idPropiedad']?>"  class="btn btn-default" >Ver</a>
                </div>
        </div>
    <?php else:?>
        <div class="item">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?=base_url().$value['fotos'][0]['url']?>');"></div>
                <div class="carousel-caption">
                    <h2><?=$value['titulo']?></h2>
                    <h4><?=$value['descripcion']?></h4>
                    <h3><?=$value['valor_publicado']?>UF</h3>
                    <a href="<?=base_url().'index.php/inicio/propiedad/'.$value['idPropiedad']?>"  class="btn btn-default" >Ver</a>
                </div>
        </div>
    <?php endif ?>
            
<?php endforeach ?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>
    <br/>
    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- thumnail -->
                <?php foreach ($pro as $key => $value): ?>
                <!--<div class="row">-->
                  <div class="col-sm-2 col-md-3">
                    <div class="thumbnail">
                      <img width="100%" src="<?=base_url().$value['fotos'][0]['url']?>" alt="...">
                      <div class="caption">
                        <h4 class="text-center"><?=$value['titulo']?></h4>
                        <p class="text-center"><?=$value['sector']?></p>
                        <p class="text-center"><?=$value['descripcion']?></p>
                        <h5 class="text-center"><?=$value['valor_publicado']?> UF</h5>
                        <p><a href="#" class="btn btn-primary btn-block" role="button">IR</a></p>
                      </div>
                     </div>
                    </div>
               <!-- </div>-->
                <?php endforeach ?>
        <!-- thumnail -->
    </div>
</div>
</div>
<script>
$(document).ready(function(){     
alert('ME MUEVO');  
   var scroll_start = 0;
   var startchange = $('#startchange');
   var offset = startchange.offset();
    if (startchange.length){
   $(document).scroll(function() { 
    alert('ME MUEVO');
      scroll_start = $(this).scrollTop();
      if(scroll_start > offset.top) {
          $(".navbar").css('background-color', '#f0f0f0');
       } else {
          $('.navbar').css('background-color', '#fff');
       }
   });
    }
});

    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url();?>/assets/js/bootstrap.min.js"></script>
