<?php include "lib/lib_core.php";


?>


<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="img/devel-slack-logo2-32x32.png" />
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Slackzone Development</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <style>
  
   .stretch-card>.card {
     width: 100%;
     min-width: 100%
 }

 body {
     background-color: #f9f9fa
 }

 .flex {
     -webkit-box-flex: 1;
     -ms-flex: 1 1 auto;
     flex: 1 1 auto
 }

 @media (max-width:991.98px) {
     .padding {
         padding: 1.5rem
     }
 }

 @media (max-width:767.98px) {
     .padding {
         padding: 1rem
     }
 }

 .padding {
     padding: 3rem
 }

 .card {
     box-shadow: none;
     -webkit-box-shadow: none;
     -moz-box-shadow: none;
     -ms-box-shadow: none
 }

 .card {
     position: relative;
     display: flex;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid #3da5f;
     border-radius: 0
 }

 .card .card-body {
     padding: 1.25rem 1.75rem
 }

 .card .card-title {
     color: #000000;
     margin-bottom: 0.625rem;
     text-transform: capitalize;
     font-size: 0.875rem;
     font-weight: 500
 }

 .card .card-description {
     margin-bottom: .875rem;
     font-weight: 400;
     color: #76838f
 }
  
  .btn.btn-social-icon {
     width: 50px;
     height: 50px;
     padding: 0
 }

 .template-demo>.btn {
     margin-right: 0.5rem !important
 }

 .template-demo {
     margin-top: 0.5rem !important
 }

 .btn.btn-rounded {
     border-radius: 50px
 }

 .btn-outline-facebook {
     border: 1px solid #3b579d;
     color: #3b579d
 }

 .btn-outline-facebook:hover {
     background: #3b579d;
     color: #ffffff
 }

 .btn-outline-youtube {
     border: 1px solid #e52d27;
     color: #e52d27
 }

 .btn-outline-twitter {
     border: 1px solid #2caae1;
     color: #2caae1
 }

 .btn-outline-dribbble {
     border: 1px solid #ea4c89;
     color: #ea4c89
 }

 .btn-outline-linkedin {
     border: 1px solid #0177b5;
     color: #0177b5
 }

 .btn-outline-instagram {
     border: 1px solid #dc4a38;
     color: #dc4a38
 }

 .btn-outline-twitter:hover {
     background: #2caae1;
     color: #ffffff
 }

 .btn-outline-linkedin:hover {
     background: #0177b5;
     color: #ffffff
 }

 .btn-outline-youtube:hover {
     background: #e52d27;
     color: #ffffff
 }

 .btn-outline-instagram:hover {
     background: #e52d27;
     color: #ffffff
 }

 .btn-facebook {
     background: #3b579d;
     color: #ffffff
 }

 .btn-youtube {
     background: #e52d27;
     color: #ffffff
 }

 .btn-twitter {
     background: #2caae1;
     color: #ffffff
 }

 .btn-dribbble {
     background: #ea4c89;
     color: #ffffff
 }

 .btn-linkedin {
     background: #0177b5;
     color: #ffffff
 }

 .btn-instagram {
     background: #dc4a38;
     color: #ffffff
 }

 .btn-facebook:hover,
 .btn-facebook:focus {
     background: #2d4278;
     color: #ffffff
 }

 .btn-youtube:hover,
 .btn-youtube:focus {
     background: #c21d17;
     color: #ffffff
 }

 .btn-twitter:hover,
 .btn-twitter:focus {
     background: #1b8dbf;
     color: #ffffff
 }

 .btn-dribbble:hover,
 .btn-dribbble:focus {
     background: #e51e6b;
     color: #ffffff
 }

 .btn-linkedin:hover,
 .btn-linkedin:focus {
     background: #015682;
     color: #ffffff
 }

 .btn-instagram:hover,
 .btn-instagram:focus {
     background: #bf3322;
     color: #ffffff
 }
  
  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            <img src="img/devel-slack-logo2-32x32.png"  class="img-reponsive img-rounded"> Slackzone Development
        </button>
       
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          
          <li class="nav-item">
            <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal3">
            <img src="img/devel-slack-logo2-32x32.png"  class="img-reponsive img-rounded"> Sobre mi
        </button>
          </li>
          
          <li class="nav-item">
            <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2">
            <img src="img/devel-slack-logo2-32x32.png"  class="img-reponsive img-rounded"> Contacto
        </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <br><br><br><br><hr>
        <ul class="list-unstyled">
          <img class="img-fluid rounded" src="img/devel-slack-logo1.png" alt="">
          <hr>
        </ul>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/jquery/jquery.js"></script>
  
  <?php
  
  modal_1();
  
  modal_2();
  
  modal_3();
  
  ?>

</body>

</html>
