<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login | Inicio de Sesión</title>
    
    
     <link href="<?=base_url();?>/assets/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="<?=base_url();?>/assets/css/style.css">

      <?php
    $usr = $this->session->userdata();
    if(count($usr)>1){redirect('/sistema/administrar_propiedades','refresh');}
      ?>
  </head>

  <body>

      <div class="wrapper">
    <form class="form-signin" method="POST" action="<?=base_url();?>index.php/sistema/login">       
      <h2 class="form-signin-heading">Ingrese sus datos</h2>
      <input type="text" class="form-control" name="usr" placeholder="Email Address" required="" autofocus="" />
      <input type="password" class="form-control" name="pass" placeholder="Password" required=""/>      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Inciar Sesión</button>   
    </form>
  </div>
    
    
    
    
    
  </body>
</html>
