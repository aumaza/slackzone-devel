<?php

/*
** funcion que carga la tabla de todos los clientes
*/


function clientes($conn){

if($conn)
{
	$sql = "SELECT * FROM sd_clientes";
    	mysqli_select_db($conn,'slack_devel');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../icons/actions/user-group-properties.png"  class="img-reponsive img-rounded"> Administración de Clientes';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Cliente</th>
            <th class='text-nowrap text-center'>Email</th>
            <th class='text-nowrap text-center'>Dirección</th>
            <th class='text-nowrap text-center'>Localidad</th>
            <th class='text-nowrap text-center'>Teléfono</th>
            <th class='text-nowrap text-center'>Movil</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['cliente_nombre']."</td>";
			 echo "<td align=center>".$fila['email']."</td>";
			 echo "<td align=center>".$fila['direccion']."</td>";
			 echo "<td align=center>".$fila['localidad']."</td>";
			 echo "<td align=center>".$fila['telefono']."</td>";
			 echo "<td align=center>".$fila['movil']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   echo '<button type="submit" class="btn btn-primary btn-sm" name="edit_user"><img src="../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>';
                   echo '<button type="submit" class="btn btn-danger btn-sm" name="del_user"><img src="../icons/actions/edit-delete.png"  class="img-reponsive img-rounded"> Borrar</button>';
             echo '</form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form <action="#" method="POST">
			<button type="submit" class="btn btn-default btn-sm" name="add_cliente">
			  <img src="../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Cliente</button>
		      </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Usuarios:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}


/*
** funcion que carga la tabla de todos los clientes
*/


function cliente($nombre,$conn){

if($conn)
{
	$sql = "SELECT * FROM sd_clientes where cliente_nombre = '$nombre'";
    	mysqli_select_db($conn,'slack_devel');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../icons/actions/user-group-properties.png"  class="img-reponsive img-rounded"> Administración de Clientes';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Cliente</th>
            <th class='text-nowrap text-center'>Email</th>
            <th class='text-nowrap text-center'>Dirección</th>
            <th class='text-nowrap text-center'>Localidad</th>
            <th class='text-nowrap text-center'>Teléfono</th>
            <th class='text-nowrap text-center'>Movil</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['cliente_nombre']."</td>";
			 echo "<td align=center>".$fila['email']."</td>";
			 echo "<td align=center>".$fila['direccion']."</td>";
			 echo "<td align=center>".$fila['localidad']."</td>";
			 echo "<td align=center>".$fila['telefono']."</td>";
			 echo "<td align=center>".$fila['movil']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   echo '<button type="submit" class="btn btn-primary btn-sm" name="edit_user"><img src="../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>';
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
** formulario para agregar Clientes
*/
function formAddCliente(){

         
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../icons/actions/list-add.png" /> Agregar Nuevo Cliente</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
            
            <div class="form-group">
              <label>Nombre del Cliente:</label>
		<input type="text" class="form-control" name="cliente" placeholder="Ingrese el Nombre del Cliente " required>
            </div><hr>
            
            <div class="form-group">
	      <label>Email:</label>
		<input type="email" class="form-control" name="email" placeholder="Ingrese el email del Cliente" required>
            </div><hr>
            
            <div class="form-group">
	      <label>Dirección:</label>
		<input type="text" class="form-control" name="direccion" placeholder="Ingrese la dirección del Cliente" required>
            </div><hr>
            
            <div class="form-group">
	      <label">Localidad:</label>
		<input type="text" class="form-control" name="localidad" placeholder="Ingrese la Localidad del Cliente" required>
            </div><hr>
            
            <div class="form-group">
	      <label">Teléfono Fijo:</label>
		<input type="text" class="form-control" name="telefono" placeholder="Ingrese número de teléfono" required>
            </div><hr>
            
            <div class="form-group">
	      <label">Teléfono Móvil:</label>
		<input type="text" class="form-control" name="movil" placeholder="Ingrese número de Móvil" required>
            </div><hr>
            
                 
            <button type="submit" class="btn btn-success btn-block" name="addCliente">Guardar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


/*
** formulario para editar Cliente
*/
function formEditCliente($id,$conn){

         $sql = "select * from sd_clientes where id = '$id'";
         mysqli_select_db($conn,'slacl_devel');
         $query = mysqli_query($conn,$sql);
         while($fila = mysqli_fetch_array($query)){
            $cliente = $fila['cliente_nombre'];
            $email = $fila['email'];
            $direccion = $fila['direccion'];
            $localidad = $fila['localidad'];
            $telefono = $fila['telefono'];
            $movil = $fila['movil'];         
         }
         
         
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../icons/actions/document-edit.png" /> Editar Cliente</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
	    <input type="hidden" class="form-control" name="id" value="'.$id.'">
            
            <div class="form-group">
              <label>Nombre del Cliente:</label>
		<input type="text" class="form-control" name="cliente" value="'.$cliente.'" required>
            </div><hr>
            
            <div class="form-group">
	      <label>Email:</label>
		<input type="email" class="form-control" name="email" value="'.$email.'" required>
            </div><hr>
            
            <div class="form-group">
	      <label>Dirección:</label>
		<input type="text" class="form-control" name="direccion" value="'.$direccion.'" required>
            </div><hr>
            
            <div class="form-group">
	      <label">Localidad:</label>
		<input type="text" class="form-control" name="localidad" value="'.$localidad.'" required>
            </div><hr>
            
            <div class="form-group">
	      <label">Teléfono Fijo:</label>
		<input type="text" class="form-control" name="telefono" value="'.$telefono.'" required>
            </div><hr>
            
            <div class="form-group">
	      <label">Teléfono Móvil:</label>
		<input type="text" class="form-control" name="movil" value="'.$movil.'" required>
            </div><hr>
            
                 
            <button type="submit" class="btn btn-success btn-block" name="editCliente">Actualizar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}



/*
** funcion que agrega Producto
*/
function addCliente($cliente,$email,$direccion,$localidad,$telefono,$movil,$conn){

    $sql = "select cliente_nombre, email from sd_clientes where cliente_nombre = '$cliente' or email = '$email'";
    mysqli_select_db($conn,'slack_devel');
    $query = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($query);
    
    
          
    if($rows == 0){
            
           $consulta = "INSERT INTO sd_clientes".
            "(cliente_nombre,email,direccion,localidad,telefono,movil)".
            "VALUES ".
        "('$cliente','$email','$direccion','$localidad','$telefono','$movil')";
        mysqli_select_db($conn,'slack_devel');
        $resp = mysqli_query($conn,$consulta);
            
            if($resp){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Cliente Agregado Satisfactoriamente.';
		    newPass($conn,$cliente,$email);
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al Agregar el Cliente. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }
		    }else{
		    
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Ya existe registro de ese Cliente.';
			    echo "</div>";
			    echo "</div>";
			    exit;
		    
		    }

}


/*
** funcion actualizar registro de clientes
*/
function updateCliente($id,$cliente,$email,$direccion,$localidad,$telefono,$movil,$conn){

        $sql = "update sd_clientes set cliente_nombre = '$cliente', email = '$email', direccion = '$direccion', telefono = '$telefono', movil = '$movil' where id = '$id'";
        mysqli_select_db($conn,'slack_devel');
        $query = mysqli_query($conn,$sql);
        
        if($query){
		    echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Registro Actualizado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
        }else{
                    echo "<br>";
                    echo '<div class="container">';
                    echo '<div class="alert alert-warning" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al Actualizar el Registro. '  .mysqli_error($conn);
                    echo "</div>";
                    echo "</div>";
                }


}


/*
** funcion para eliminar un registro de cliente
*/
function formEliminarCliente($id,$conn){

        $sql = "select * from sd_clientes where id = '$id'";
        mysqli_select_db($conn,'slack_devel');
        $query = mysqli_query($conn,$sql);
        while($fila = mysqli_fetch_array($query)){
                $cliente = $fila['cliente_nombre'];
            }
            
            echo '<div class="container">
		    <div class="row">
		      <div class="col-sm-8">
            
            <div class="panel panel-danger">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../icons/status/security-low.png" /> Clientes - Eliminar Registro</div>
            <div class="panel-body">
            
            <form action="main.php" method="POST">
	      <input type="hidden" class="form-control" name="id" value="'.$id.'">
            
                <div class="alert alert-danger">
		  <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> <strong>Atención!</strong><hr>
		    <p>Está por eliminar el registro del siguiente cliente: <strong>'.$cliente.'</strong></p>
		    <p>Si está seguro, presione Aceptar, de lo contrario presione Cancelar.</p>
                </div><hr>
            
            <button type="submit" class="btn btn-success btn-block" name="delete_cliente">Aceptar</button><br>
            
            </form>
	      <a href="main.php"><button type="button" class="btn btn-danger btn-block">Cancelar</button></a>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


/*
** funcion que elimina registro de cliente
*/
function deleteCliente($id,$conn){
       
                
         $sql = "delete sd_clientes, sd_usuarios from sd_clientes join sd_usuarios on sd_clientes.cliente_nombre = sd_usuarios.nombre where sd_clientes.id = '$id'";
         mysqli_select_db($conn,'slack_devel');
         $query = mysqli_query($conn,$sql);
           
    if($query){
            
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Registro Eliminado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
     }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al Eliminar el Registro.'  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }

}

///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////// SECCION REGENERACION PASSWORD ///////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
/*
** Funcion para generar archivo de password
*/


function gentxt($usuario,$password){
  
  $fileName = "gen_pass/$usuario.pass.txt"; 
    
  if (file_exists($fileName)){
  
  //echo "Archivo Existente...";
  //echo "Se actualizaran los datos...";
  $file = fopen($fileName, 'w+') or die("Se produjo un error al crear el archivo");
  
  fwrite($file, $password) or die("No se pudo escribir en el archivo");
  
  fclose($file);
	
	echo '<div class="alert alert-info" role="alert">';
	echo "Se ha generado su archivo de password. Descargue el archivo generado. Recuerde modificar su Password cuando ingrese nuevamente.";
	echo "</div>";
  echo "<hr>";
  echo '<a href="download_pass.php?file_name='.$fileName.'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-save"></span> Descargar</a>';
 
  }else{
  
      //echo "Se Generará archivo de respaldo..."
      $file = fopen($fileName, 'w') or die("Se produjo un error al crear el archivo");
      fwrite($file, $password) or die("No se pudo escribir en el archivo");
      fclose($file);
	
        echo '<div class="alert alert-info" role="alert">';
	echo "Se ha generado su archivo de password. Descargue el archivo generado. Recuerde modificar su Password cuando ingrese nuevamente.";
	echo "</div>";
        echo "<hr>";
        echo '<a href="download_pass.php?file_name='.$fileName.'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-save"></span> Descargar</a>';
       
  
  }
  
  
}


/*
** Funcion para generar nuevo archivo de password
*/


function genNewTxt($cliente,$password){
  
  $fileName = "gen_pass/$cliente.pass.txt"; 
    
  if (file_exists($fileName)){
  
  //echo "Archivo Existente...";
  //echo "Se actualizaran los datos...";
  $file = fopen($fileName, 'w+') or die("Se produjo un error al crear el archivo");
  
  fwrite($file, $password) or die("No se pudo escribir en el archivo");
  
  fclose($file);
	
	echo '<div class="alert alert-info" role="alert">';
	echo "Se ha generado su archivo de password. Descargue el archivo generado. Recuerde modificar su Password cuando ingrese nuevamente.";
	echo "</div>";
  echo "<hr>";
  echo '<a href="download_pass.php?file_name='.$fileName.'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-save"></span> Descargar</a>';
 
  }else{
  
      //echo "Se Generará archivo de respaldo..."
      $file = fopen($fileName, 'w') or die("Se produjo un error al crear el archivo");
      fwrite($file, $password) or die("No se pudo escribir en el archivo");
      fclose($file);
	
        echo '<div class="alert alert-info" role="alert">';
	echo "Se ha generado su archivo de password. Descargue el archivo generado. Recuerde modificar su Password cuando ingrese nuevamente.";
	echo "</div>";
        echo "<hr>";
        echo '<a href="download_pass.php?file_name='.$fileName.'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-save"></span> Descargar</a>';
       
  
  }
  
  
}


/*
** Funcion para generar password aleatorio
*/

function genPass(){
    //Se define una cadena de caractares.
    //Os recomiendo desordenar las minúsculas, mayúsculas y números para mejorar la probabilidad.
    $string = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890@";
    //Obtenemos la longitud de la cadena de caracteres
    $stringLong = strlen($string);
 
    //Definimos la variable que va a contener la contraseña
    $pass = "";
    //Se define la longitud de la contraseña, puedes poner la longitud que necesites
    //Se debe tener en cuenta que cuanto más larga sea más segura será.
    $longPass=15;
 
    //Creamos la contraseña recorriendo la cadena tantas veces como hayamos indicado
    for($i=1 ; $i<=$longPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos = rand(0,$stringLong-1);
 
        //Vamos formando la contraseña con cada carácter aleatorio.
        $pass .= substr($string,$pos,1);
    }
    return $pass;
}

/*
** Funcion para blanquear password
*/

function resetPass($conn,$usuario){

  $password = genPass();
  
  $sql = "UPDATE sd_usuarios SET password = '$password' where user = '$usuario'";
  
  $retval = mysqli_query($conn,$sql);
 
  
  if($retval){
    echo '<div class="container">
      <div class="row">
      <div class="col-md-6">';
    
    echo '<div class="alert alert-success" role="alert">';
    echo "Su Password fue blanqueada con Exito!";
    echo "<br>";
    gentxt($usuario,$password);
    
    echo "</div>";
    echo '</div>
	  </div>
	  </div>';
    
  }else{
    
    echo '<div class="container">
      <div class="row">
      <div class="col-md-6">';
    echo '<div class="alert alert-danger" role="alert">';
    echo "Error al Blanquear Password";
    echo "</div>";
     echo '</div>
	  </div>
	  </div>';
    
  }
   
}


/*
** Funcion para blanquear password
*/

function newPass($conn,$cliente,$email){

  $password = genPass();
  $role = 1;
  
  $sql = "INSERT INTO sd_usuarios".
            "(nombre,user,password,role)".
            "VALUES ".
        "('$cliente','$email','$password','$role')";
  mysqli_select_db($conn,'slack_devel');
  $retval = mysqli_query($conn,$sql);
 
  
  if($retval){
    echo '<div class="container">
      <div class="row">
      <div class="col-md-6">';
    
    echo '<div class="alert alert-success" role="alert">';
    echo "Usuario Generado con Exito!";
    echo "<br>";
    genNewTxt($cliente,$password);
    
    echo "</div>";
    echo '</div>
	  </div>
	  </div>';
    
  }else{
    
    echo '<div class="container">
      <div class="row">
      <div class="col-md-6">';
    echo '<div class="alert alert-danger" role="alert">';
    echo "Error al Generar Usuario";
    echo "</div>";
     echo '</div>
	  </div>
	  </div>';
    
  }
   
}


////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////// FIN SECCION GENERACION PASSWORD////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////

?>
