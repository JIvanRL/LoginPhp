<?php

//index.php

//Include Configuration File
include('config.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{

 $login_button = '<a href="'.$google_client->createAuthUrl().'">Login With Google</a>';
}

?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PHP Login using Google Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/style.css">
  <script src="https://www.paypal.com/sdk/js?client-id=AZE_rm3yYMJ4zeCSspo32jzne3-09446rtutUHSBw0mt1JmJ4zDD38zMtR6H_HwRu1Dw3X4iS8IBeqW5&currency=MXN"></script>
    <!-- <script src="js/action.js" type="text/javascript"></script> -->
    
    
 
 </head>
 <body>
 <div class="container-fluid">
  <div class=" sticky-top text-center my-3 flex-column">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center ">
        <nav class="navbar navbar-expand-lg bg-body-tertiary rounded shadow ">
          <div class="container-fluid p-6">
            <div class="panel panel-default">
              <?php
              if($login_button == '') {
                echo '<div class="row">';
                echo '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-1 col-xxl-4 text-center">';
                echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" alt="Logo" width="60" height="48" />';//obtenemos la foto del usuario 
                echo '</div>';
                echo '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 text-center">';
                echo '<h3 class="navbar-brand"> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';//obetenemos el nombre del usuario 
                echo '</div>';
                echo '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-2 col-xxl-4 text-center">';
                echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">';
                echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">';
                echo '<li class="nav-item"><a class="nav-link disabled" aria-disabled="true"> '.$_SESSION['user_email_address'].'</a></li>';//obetenemos el email del usuario
                echo '<nav class="navbar bg-body-tertiary col-xl-8">
                        <div class="container-fluid">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        </div>
                    </nav>';
                echo '<li class="nav-item"><a class="nav-link" href="logout.php">Cerrar sesión</a></li>';
              } else {
                echo '<div align="center">'.$login_button . '</div>';
              }
              ?>
            </div>
          </div>  
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="container">
        <div class="row">
            <main id="productos" class="col-sm-8 row">
                <div class="card col-sm-4">
                    <div class="card-body">
                        <h5 class="card-title">Audifonos AirPods</h5>
                        <img class="img-fluid" src="../LoginPhp/img/productos/pro1.jpeg" alt="imgUno">
                        <p class="card.text">$345.00</p>
                        <button class="btn btn-primary" onclick="agregarCarro1()">+</button> Agregar al carrito
                    </div>
                </div>
                <div class="card col-sm-4">
                    <div class="card-body">
                        <h5 class="card-title">Audifonos Bose</h5>
                        <img class="img-fluid" src="../LoginPhp/img/productos/pro2.jpeg" alt="imgDos">
                        <p class="card.text">$3500.00</p>
                        <button class="btn btn-primary" onclick="agregarCarro2()">+</button> Agregar al carrito
                    </div>
                </div>
                <div class="card col-sm-4">
                    <div class="card-body">
                        <h5 class="card-title">Audifonos Ombie</h5>
                        <img class="img-fluid" src="../LoginPhp/img/productos/pro3.jpeg" alt="imgTres">
                        <p class="card.text">$6000.00</p>
                        <button class="btn btn-primary" onclick="agregarCarro3()">+</button> Agregar al carrito
                    </div>
                </div>
               
            </main>
            <aside class="col-sm-4">
                <h2> Carrito</h2>
                <ul id="carrito" class="list-group"></ul>
                <hr>
                <p class="text right"> Total: $<span id="total"></span></p>
                                      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Pagar
</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel" align="center">Pagar con</h1>
      </div>
      <div class="modal-body">
      <div id="paypal-button-container" style="max-width:1000px;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
            </aside>
        </div>
    </div>
    <script src="js/actionsCarro.js" type="text/javascript"></script>
 </body>
</html>