<?php

function usuarios($conn){

if($conn)
{
	$sql = "SELECT * FROM sd_usuarios";
    	mysqli_select_db($conn,'slack_devel');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../icons/actions/user-group-properties.png"  class="img-reponsive img-rounded"> Administración de Usuarios';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Nombre</th>
            <th class='text-nowrap text-center'>Usuario</th>
            <th class='text-nowrap text-center'>Avatar</th>
            <th class='text-nowrap text-center'>Role</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['nombre']."</td>";
			 echo "<td align=center>".$fila['user']."</td>";
			 echo "<td align=center>".$fila['avatar']."</td>";
			 echo "<td align=center>".$fila['role']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                    if($fila['user'] != 'root'){
                     echo '<button type="submit" class="btn btn-warning btn-sm" name="allow_user"><img src="../icons/status/dialog-password.png"  class="img-reponsive img-rounded"> Cambiar Permisos</button>';
                     }
             echo '</form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Usuarios:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}

/*
** funcion formulario de edicion de password de usuario
*/

function formEditRole($id,$conn){

      $sql = "select * from sd_usuarios where id = '$id'";
      mysqli_select_db($conn,'slack_devel');
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);
      

      echo   '<h2>Cambiar Permisos</h2><hr>
	      
	      <form action="main.php" method="POST">
	      <input type="hidden" id="id" name="id" value="'.$id.'" />
   
         
	  <div class="input-group">
	    <span class="input-group-addon">Nombre y Apellido</span>
	    <input id="text" type="text" class="form-control" value="' . $fila['nombre'].'" name="nombre" value="" onkeyup="this.value=Text(this.value);" readonly required>
	  </div>
	
	  <div class="input-group">
	    <span class="input-group-addon">Usuario</span>
	    <input id="text" type="text" class="form-control" name="user" onKeyDown="limitText(this,20);" onKeyUp="limitText(this,20);" value="' . $fila['user'].'" readonly required>
	  </div><hr>
	  
	   <div class="form-group">
        <label for="sel1">Seleccione Permiso:</label>
        <select class="form-control" id="sel1" name="role" required>
            <option value="" disabled selected>Seleccionar</option>
            <option value="1" '.($fila['role'] == "1" ? "selected" : ""). '>Usuario Habilitado</option>
            <option value="0" '.($fila['role'] == "0" ? "selected" : ""). '>Usuario Deshabilitado</option>
            </select>
        </div> 
	  <br>
	
	  <button type="submit" class="btn btn-success btn-block" name="roles"><img src="../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded">  Cambiar Permiso</button><br><hr>
	  </form>';
	  
}

/*
* Funcion para cambiar los permisos de los usuarios al sistema
*/

function cambiarPermisos($id,$role,$conn){

  $sql = "UPDATE sd_usuarios set role = '$role' where id = '$id'";
  mysqli_select_db($conn,'slack_devel');
  $retval = mysqli_query($conn,$sql);
  
  if($retval){
    
    echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-success" role="alert">';
			echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Permiso Actualizado Satisfactoriamente';
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
  
	  }else{
			echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-warning" role="alert">';
			echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un Error al intentar cambiar permisos. Intente Nuevamente!';
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
 
}



?>
