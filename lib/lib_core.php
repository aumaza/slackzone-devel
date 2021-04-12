<?php

/*
** Funcion que carga esqueleto del sistema
*/

function skeleton(){

  echo '<link rel="stylesheet" href="/slackzone-devel/skeleton/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/slackzone-devel/skeleton/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="/slackzone-devel/skeleton/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="/slackzone-devel/skeleton/css/jquery.dataTables.min.css" >
	<link rel="stylesheet" href="/slackzone-devel/skeleton/Chart.js/Chart.min.css" >
	<link rel="stylesheet" href="/slackzone-devel/skeleton/Chart.js/Chart.css" >
	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/slackzone-devel/skeleton/js/jquery-3.4.1.min.js"></script>
	<script src="/slackzone-devel/skeleton/js/bootstrap.min.js"></script>
	
	<script src="/slackzone-devel/skeleton/js/jquery.dataTables.min.js"></script>
	<script src="/slackzone-devel/skeleton/js/dataTables.editor.min.js"></script>
	<script src="/slackzone-devel/skeleton/js/dataTables.select.min.js"></script>
	<script src="/slackzone-devel/skeleton/js/dataTables.buttons.min.js"></script>
	
	<script src="/slackzone-devel/skeleton/Chart.js/Chart.min.js"></script>
	<script src="/slackzone-devel/skeleton/Chart.js/Chart.bundle.min.js"></script>
	<script src="/slackzone-devel/skeleton/Chart.js/Chart.bundle.js"></script>
	<script src="/slackzone-devel/skeleton/Chart.js/Chart.js"></script>';
}



function modal_1(){

    echo '<!-- The Modal -->
            <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">
                        <img src="img/devel-slack-logo2-32x32.png"  class="img-reponsive img-rounded"> Slackzone Development</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p align="justify"> Desarrollamos software a tu medida y necesidad. Desde Sitios Web Informativos, como Web Apps o software instalable. Siempre haciendo incapié en la necesidad del cliente. Los rubros puden ser: 
                    <ul>
                    <li> Administración de Turnos (Barberias, Estéticas, Consultorios) </li>
                    <li> Control de Stock (Kioskos, Almecenes, etc) </li>
                    </ul>
                    
                    Todos nuestros desarrollos están basados en software libre, no trabajamos con licencias privativas.
                    Ofrecemos seriedad y compromiso, con seguimiento posterior a la entrega del software realizado.
                    </p>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>

                </div>
            </div>
            </div>';

}

function modal_2(){

    echo '<!-- The Modal -->
            <div class="modal" id="myModal2">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">
                        <img src="img/devel-slack-logo2-32x32.png"  class="img-reponsive img-rounded"> Contacto</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p align="center"> Visitanos en las redes sociales<br><br>
                    <a href="https://www.facebook.com/profile.php?id=100065529521417" target="_blank"><button type="button" class="btn btn-social-icon btn-facebook btn-rounded" data-toggle="tooltip" data-placement="bottom" title="Facebook">
                            <i class="fa fa-facebook"></i></button></a>
                    <button type="button" class="btn btn-social-icon btn-linkedin btn-rounded" data-toggle="tooltip" data-placement="bottom" title="Linkedin">
                            <i class="fa fa-linkedin"></i></button> 
                    <button type="button" class="btn btn-social-icon btn-instagram btn-rounded" data-toggle="tooltip" data-placement="bottom" title="Instagram">
                            <i class="fa fa-instagram"></i></button><hr>
                    </p>
                    <p align="center">Email: <a href="mailto: develslack@gmail.com" > develslack@gmail.com</a></p>
                                        
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>

                </div>
            </div>
            </div>';

}


function modal_3(){

    echo '<!-- The Modal -->
<div class="modal" id="myModal3">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Sobre Mi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p align="justify"> Soy Augusto Maza, Técnico Electromecánico y Desarrollador de Software. Apasionado por la música y la programación.</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>';

}


/*
** cargador de formulario para login
*/
function formLogin(){

   echo '<p class="lead">Ingreso para Clientes</p>
        <p>Por favor tipee sus datos</p><hr>
            <form action="index.php" method="POST">
            <div class="form-group">
            <label for="usr">Usuario:</label>
            <input style="text-align: center" type="text" class="form-control" id="usr" name="user" placeholder="Ingrese su email">
            </div>
            <div class="form-group">
            <label for="pwd">Password:</label>
            <input  style="text-align: center" type="password" class="form-control" id="pwd" name="pass">
            </div>
            <button type="submit" class="btn btn-success" name="A">Ingresar</button>
            <button type="reset" class="btn btn-danger ">Limpiar</button>
            </form>
            <hr>';

}

/*
<p>Uitlice el botón aquí debajo, para abonar el servicio por Mercado Pago. Muchas Gracias!</p>
          <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js" data-preference-id="216891779-38bdb0fe-00d9-4e46-908b-a60bca6fee8d" data-source="button"></script><hr>
*/

/*
** funcion para realizar backup de base de datos
*/
function dumpMysql($conn){

    if($conn){
    
    $dbname = "slack_devel";
    $file = $dbname.'-' . date("d-m-Y") . '.sql';
    $dump = "mysqldump --user=root --password=slack142 slack_devel > $file";
    $command = system($dump);
    chmod($file, 0777);

    copy($file, "../sqls/$file");
    unlink($file);
    echo '<div class="alert alert-success" role="alert">';
    echo '<h1 class="panel-title text-left" contenteditable="true">
	    <img src="../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"><strong> Base de Datos Resguardada Exitosamente</strong></h1>';
    echo "</div>";
        
    }else{
       
	echo '<div class="alert alert-danger" role="alert">';
	echo '<h1 class="panel-title text-left" contenteditable="true">
		<img src="../../icons/actions/dialog-ok-apply.png" class="img-reponsive img-rounded"><strong>'. mysqli_error($conn). '</strong></h1>
	      </div>';
         
         }
         

}


?>
