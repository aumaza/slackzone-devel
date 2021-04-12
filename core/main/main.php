<?php session_start();
      include "../connection/connection.php";
      include "../../lib/lib_core.php";
      include "lib_users/lib_users.php";
      include "lib_clients/lib_clients.php";
      include "lib_projects/lib_projects.php";
      
      
      $usuario = $_SESSION['user'];
      $password = $_SESSION['pass'];
      
         
	$sql = "select nombre from sd_usuarios where user = '$usuario' and password = '$password'";
	mysqli_select_db($conn,'slack_devel');
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($query)){
	      $nombre = $row['nombre'];
	}
	
	if($usuario == null || $usuario = ''){
 
    echo '<!DOCTYPE html>
            <html lang="es">
            <head>
            <title>Slackzone Development</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" type="image/png" href="../icons/apps/accessories-dictionary.png" />';
            skeleton();
            echo '</head><body>';
            echo '<br><div class="container">
                    <div class="alert alert-danger" role="alert">';
            echo '<p align="center"><img src="../icons/status/task-attempt.png"  class="img-reponsive img-rounded"> '.$usuario.' Su sesión a caducado. Por favor, inicie sesión nuevamente</p>';
            echo '<a href="../logout.php"><hr><button type="buton" class="btn btn-default btn-block"><img src="../icons/status/dialog-password.png"  class="img-reponsive img-rounded"> Iniciar</button></a>';	
            echo "</div></div>";
            die();
            echo '</body></html>';
	}
	

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <title>Slackzone Development - Panel de Usuario</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../icons/categories/preferences-desktop.png" />
  <?php skeleton(); ?>
  
  <!-- Data Table Script -->
<script>
 $(document).ready(function(){
      $('#myTable').DataTable({
      "order": [[1, "asc"]],
      "responsive": true,
      "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "fixedColumns": true,
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });

  });
  </script>
  <!-- END Data Table Script -->
  
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav"><br>
    <div class="alert alert-success">
      <h4>Usuario: <?php echo $nombre  ?></h4>
      <form action="#" method="POST">
        <button type="submit" class="btn btn-default" name="home">
          <img src="../icons/actions/go-home.png"  class="img-reponsive img-rounded"> Home</button>
        </form>      
      </div><hr>
      <ul class="nav nav-pills nav-stacked">
        
        <form action="#" method="POST">
        
        <?php 
        if($_SESSION['user'] != 'root'){
        echo  '<li class="active">
            <button type="submit" class="btn btn-default" name="A">
                <img src="../icons/actions/view-media-artist.png"  class="img-reponsive img-rounded"> Datos Personales</button>
        </li><hr>';
        }
        ?>
        
        <li class="active">
            <button type="submit" class="btn btn-default" name="edit_password">
                <img src="../icons/status/dialog-password.png"  class="img-reponsive img-rounded"> Cambiar Password</button>
        </li><hr>
       
       <?php
       if($_SESSION['user'] != 'root'){
        echo '<li>
            <button type="submit" class="btn btn-default" name="B">
                <img src="../icons/actions/preferences-activities.png"  class="img-reponsive img-rounded"> Mis Proyectos</button>
        </li><hr>';
        }
        ?>
        
        <?php
        
        if($_SESSION['user'] == 'root'){
        
        echo '<li>
         <button type="submit" class="btn btn-default" name="C">
            <img src="../icons/actions/svn-update.png"  class="img-reponsive img-rounded"> Resguardo Base de Datos</button>
        </li><hr>
        
        <li>
        <button type="submit" class="btn btn-default" name="D">
            <img src="../icons/apps/system-users.png"  class="img-reponsive img-rounded"> Administrar Clientes</button>
        </li><hr>
        
        <li class="active">
            <button type="submit" class="btn btn-default" name="E">
                <img src="../icons/apps/system-users.png"  class="img-reponsive img-rounded"> Administrar Usuarios</button>
        </li><hr>
        
        <li class="active">
            <button type="submit" class="btn btn-default" name="F">
                <img src="../icons/actions/run-build-configure.png"  class="img-reponsive img-rounded"> Administrar Proyectos</button>
        </li><hr>
        
        ';
        }
        
        ?>
        
        <li class="active">
            <button type="submit" class="btn btn-danger" name="exit">
                <img src="../icons/actions/go-previous-view.png"  class="img-reponsive img-rounded"> Salir</button>
        </li>
        
      </ul><br>
      </form>
            
    </div>

    <div class="col-sm-9"><br>
    <div class="alert alert-success">
      <h4><small>Tareas</small></h4>
      </div>
      <hr>
      
      <?php
      
      if($conn){
      
      if(isset($_POST['exit'])){
        
       echo '<div class="alert alert-success">
        <p align="center"><strong>Hasta Luego!</strong></p>
        </div>
        <meta http-equiv="refresh" content="3;URL=../logout.php "/>';
      
      }
      if(isset($_POST['home'])){
        echo '<meta http-equiv="refresh" content="0;URL=#"/>';
      }
      
      
      
      // Seccion Administración de Usuarios Espacio Root
      if(isset($_POST['E'])){
        usuarios($conn);
      }
      if(isset($_POST['allow_user'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        formEditRole($id,$conn);
      }
      if(isset($_POST['roles'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $role = mysqli_real_escape_string($conn,$_POST['role']);
        cambiarPermisos($id,$role,$conn);
      }
      if(isset($_POST['edit_password'])){
        loadUserPass($conn,$nombre);
      }
      if(isset($_POST['user_pass'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        formEditPassword($id,$conn);
      }
      if(isset($_POST['update_password'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $pass1 = mysqli_real_escape_string($conn,$_POST['pass1']);
        $pass2 = mysqli_real_escape_string($conn,$_POST['pass2']);
        passwordValidate($conn,$id,$pass1,$pass2);
      }
      // fin seccion de Administracion de Usuarios de Espacio Root
      
      
      // Seccion Administracion de Clientes Espacio Root
      if(isset($_POST['D'])){
        clientes($conn);
      }
      if(isset($_POST['add_cliente'])){
        formAddCliente();
      }
      if(isset($_POST['addCliente'])){
        $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $direccion = mysqli_real_escape_string($conn,$_POST['direccion']);
        $localidad = mysqli_real_escape_string($conn,$_POST['localidad']);
        $telefono = mysqli_real_escape_string($conn,$_POST['telefono']);
        $movil = mysqli_real_escape_string($conn,$_POST['movil']);
        addCliente($cliente,$email,$direccion,$localidad,$telefono,$movil,$conn);
      }
      if(isset($_POST['edit_user'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        formEditCliente($id,$conn);
      }
      if(isset($_POST['editCliente'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $direccion = mysqli_real_escape_string($conn,$_POST['direccion']);
        $localidad = mysqli_real_escape_string($conn,$_POST['localidad']);
        $telefono = mysqli_real_escape_string($conn,$_POST['telefono']);
        $movil = mysqli_real_escape_string($conn,$_POST['movil']);
        updateCliente($id,$cliente,$email,$direccion,$localidad,$telefono,$movil,$conn);      
      }
      if(isset($_POST['del_user'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        formEliminarCliente($id,$conn);
      }
      if(isset($_POST['delete_cliente'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        deleteCliente($id,$conn);
      }
      // FIN SECCION ADMINISTRACION DE CLIENTES
      
      // SECCION ADMINISTRACION DE PROYECTOS ENTORNO ADMINISTRADOR
      if(isset($_POST['F'])){
        projects($conn);
      }
      if(isset($_POST['add_proyecto'])){
        formAddProyecto($conn);
      }
      if(isset($_POST['addProyecto'])){
        $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
        $proyecto = mysqli_real_escape_string($conn,$_POST['proyecto']);
        $estado_proyecto = mysqli_real_escape_string($conn,$_POST['estado_proyecto']);
        addProject($cliente,$proyecto,$estado_proyecto,$conn);
      }
      if(isset($_POST['edit_project'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        formEditProyecto($id,$conn);
      }
      if(isset($_POST['editProyecto'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
        $proyecto = mysqli_real_escape_string($conn,$_POST['proyecto']);
        $estado_proyecto = mysqli_real_escape_string($conn,$_POST['estado_proyecto']);
        updateProyecto($id,$cliente,$estado_proyecto,$proyecto,$conn);
      }
      if(isset($_POST['pagos_proyecto'])){
        projectsPagos($conn);
      }
      if(isset($_POST['add_pago_proyecto'])){
        formAddPagoProyecto($conn);
      }
      if(isset($_POST['addPagoProyecto'])){
        $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
        $proyecto = mysqli_real_escape_string($conn,$_POST['proyecto']);
        $estado_pago = mysqli_real_escape_string($conn,$_POST['estado_pago']);
        $fecha_pago = mysqli_real_escape_string($conn,$_POST['fecha_pago']);
        $importe_pago = mysqli_real_escape_string($conn,$_POST['importe_pago']);
        addPagoProject($cliente,$proyecto,$estado_pago,$fecha_pago,$importe_pago,$conn);
      }
      if(isset($_POST['edit_pago_project'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        formAddEditPagoProyecto($id,$conn);        
      }
      if(isset($_POST['updatePagoProyecto'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $estado_pago = mysqli_real_escape_string($conn,$_POST['estado_pago']);
        $fecha_pago = mysqli_real_escape_string($conn,$_POST['fecha_pago']);
        $importe_pago = mysqli_real_escape_string($conn,$_POST['importe_pago']);
        updatePagoProyecto($id,$estado_pago,$fecha_pago,$importe_pago,$conn);      
      }
      
      
      // FIN SECCION ADSMINISTRACION DE PROYECTOS ENTORNO ADMINISTRADOR
      
      // SECCION ADMINISTRACION
      if(isset($_POST['C'])){
        dumpMysql($conn);
      }
      
      // FIN SECCION ADMINIUSTRACION
      
      }else{
        mysqli_error($conn);
      }
      
      
      ?>
      
      
       
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p><img src="../../img/devel-slack-logo2-32x32.png"  class="img-reponsive img-rounded"> Slackzone Development</p>
</footer>

</body>
</html>
