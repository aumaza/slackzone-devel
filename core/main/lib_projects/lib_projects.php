<?php

/*
** funcion que carga la tabla de todos los proyectos por cliente
*/


function projects($conn){

if($conn)
{
	$sql = "SELECT * FROM sd_proyectos";
    	mysqli_select_db($conn,'slack_devel');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../icons/actions/run-build-configure.png"  class="img-reponsive img-rounded"> Administración de Proyectos';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Cliente</th>
            <th class='text-nowrap text-center'>Proyecto</th>
            <th class='text-nowrap text-center'>Estado Proyecto</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['cliente_nombre']."</td>";
			 echo "<td align=center>".$fila['proyecto']."</td>";
			 echo "<td align=center>".$fila['estado_proyecto']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   echo '<button type="submit" class="btn btn-primary btn-sm" name="edit_project"><img src="../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>';
                   echo '</form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form <action="#" method="POST">
			<button type="submit" class="btn btn-default btn-sm" name="add_proyecto">
			  <img src="../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Proyecto</button>
            <button type="submit" class="btn btn-default btn-sm" name="pagos_proyecto">
			  <img src="../icons/actions/view-loan.png"  class="img-reponsive img-rounded"> Administrar Pagos</button>
		      </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Proyectos:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}


/*
** formulario para agregar Clientes
*/
function formAddProyecto($conn){

         
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../icons/actions/list-add.png" /> Agregar Nuevo Proyecto</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
            
            <div class="form-group">
		  <label for="sel1">Clientes:</label>
		  <select class="form-control" name="cliente" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM sd_clientes order by cliente_nombre ASC";
		      mysqli_select_db($conn,'slack_devel');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               echo '<option value="'.$valores[cliente_nombre].'" >'.$valores[cliente_nombre].'</option>';
				}
                }
			}

			mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
            
            <div class="form-group">
	      <label>Proyecto:</label>
		<input type="text" class="form-control" name="proyecto" placeholder="Ingrese el nombre del proyecto" required>
            </div><hr>
            
            <div class="form-group">
            <label for="sel1">Estado del Proyecto:</label>
            <select class="form-control" name="estado_proyecto">
                <option value="" disabled selected>Seleccionar</option>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
                </select>
            </div><hr>
            
                           
            <button type="submit" class="btn btn-success btn-block" name="addProyecto">
                <img class="img-reponsive img-rounded" src="../icons/devices/media-floppy.png" /> Guardar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


/*
** funcion que agrega Proyecto
*/
function addProject($cliente,$proyecto,$estado_proyecto,$conn){

    $sql = "select cliente_nombre, proyecto from sd_proyectos where cliente_nombre = '$cliente' or proyecto = '$proyecto'";
    mysqli_select_db($conn,'slack_devel');
    $query = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($query);
    
    
          
    if($rows == 0){
            
           $consulta = "INSERT INTO sd_proyectos".
            "(cliente_nombre,proyecto,estado_proyecto)".
            "VALUES ".
        "('$cliente','$proyecto','$estado_proyecto')";
        mysqli_select_db($conn,'slack_devel');
        $resp = mysqli_query($conn,$consulta);
            
            if($resp){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Proyecto Agregado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al Agregar el Proyecto. '  .mysqli_error($conn);
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
** formulario para editar proyectos
*/
function formEditProyecto($id,$conn){
        
        $sql = "select * from sd_proyectos where id = '$id'";
        mysqli_select_db($conn,'slack_devel');
        $res = mysqli_query($conn,$sql);
        $fila = mysqli_fetch_assoc($res);
         
              echo '<div class="container">
                <div class="row">
                <div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../icons/actions/document-edit.png" /> Editar Proyecto</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
	    <input type="hidden" id="id" name="id" value="'.$fila['id'].'" />
            
            <div class="form-group">
		  <label for="sel1">Clientes:</label>
		  <select class="form-control" name="cliente" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM sd_clientes order by cliente_nombre ASC";
		      mysqli_select_db($conn,'slack_devel');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               echo '<option value="'.$valores[cliente_nombre].'" '.("'.$fila[cliente_nombre].'" == "'.$valores[cliente_nombre].'" ? "selected" : "").'>'.$valores[cliente_nombre].'</option>';
				}
                }
			}

			mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
            
            <div class="form-group">
	      <label>Proyecto:</label>
		<input type="text" class="form-control" name="proyecto" value="'.$fila['proyecto'].'" required>
            </div><hr>
            
            <div class="form-group">
            <label for="sel1">Estado del Proyecto:</label>
            <select class="form-control" name="estado_proyecto">
                <option value="" disabled selected>Seleccionar</option>
                <option value="Activo" '.($fila['estado_proyecto'] == "Activo" ? "selected" : ""). '>Activo</option>
                <option value="Inactivo" '.($fila['estado_proyecto'] == "Inactivo" ? "selected" : ""). '>Inactivo</option>
                </select>
            </div><hr>
            
                           
            <button type="submit" class="btn btn-success btn-block" name="editProyecto">
                <img class="img-reponsive img-rounded" src="../icons/devices/media-floppy.png" /> Guardar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


/*
** Función para editar un registro de la tabla normas
*/

function updateProyecto($id,$cliente,$estado_proyecto,$proyecto,$conn){

		
	mysqli_select_db($conn,'slack_devel');
	$sqlInsert = "update sd_proyectos set cliente_nombre = '$cliente', proyecto = '$proyecto', estado_proyecto = '$estado_proyecto' where id = '$id'";
           
	$res = mysqli_query($conn,$sqlInsert);


	if($res){
		echo "<br>";
        echo '<div class="container">';
		echo '<div class="alert alert-success" alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Proyecto Editado Satisfactoriamente.';
		echo "</div>";
		echo "</div>";
	}else{
		echo '<div class="container">';
        echo '<div class="alert alert-warning" alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al Editar el Proyecto. '  .mysqli_error($conn);
		echo "</div>";
		echo "</div>";
	}
}


/*
** funcion que carga la tabla de estado de pagos de los proyectos
*/


function projectsPagos($conn){

if($conn)
{
	$sql = "SELECT * FROM sd_proyectos_pagos";
    	mysqli_select_db($conn,'slack_devel');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../icons/actions/run-build-configure.png"  class="img-reponsive img-rounded"> Administración de Estado de Pagos de los Proyectos';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Cliente</th>
            <th class='text-nowrap text-center'>Proyecto</th>
            <th class='text-nowrap text-center'>Estado Pago</th>
            <th class='text-nowrap text-center'>Fecha Pago</th>
            <th class='text-nowrap text-center'>Importe Pago</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['cliente_nombre']."</td>";
			 echo "<td align=center>".$fila['proyecto']."</td>";
			 echo "<td align=center>".$fila['estado_pago']."</td>";
			 echo "<td align=center>".$fila['fecha_pago']."</td>";
			 echo "<td align=center>$".$fila['monto_pago']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   echo '<button type="submit" class="btn btn-primary btn-sm" name="edit_pago_project"><img src="../icons/actions/view-loan.png"  class="img-reponsive img-rounded"> Editar Pago</button>';
                   echo '</form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form <action="#" method="POST">
			<button type="submit" class="btn btn-default btn-sm" name="add_pago_proyecto">
			  <img src="../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Cargar Pago Proyecto</button>
            </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}


/*
** formulario para agregar Clientes
*/
function formAddPagoProyecto($conn){

         
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../icons/actions/list-add.png" /> Agregar Nuevo Pago de Proyecto</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
            
            <div class="form-group">
		  <label for="sel1">Clientes:</label>
		  <select class="form-control" name="cliente" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM sd_clientes order by cliente_nombre ASC";
		      mysqli_select_db($conn,'slack_devel');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               echo '<option value="'.$valores[cliente_nombre].'" >'.$valores[cliente_nombre].'</option>';
				}
                }
			}

			mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
            
            <div class="form-group">
	      <label>Proyecto:</label>
		<input type="text" class="form-control" name="proyecto" placeholder="Ingrese el nombre del proyecto" required>
            </div><hr>
            
            <div class="form-group">
            <label for="sel1">Estado Pago:</label>
            <select class="form-control" name="estado_pago">
                <option value="" disabled selected>Seleccionar</option>
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                </select>
            </div><hr>
            
            <div class="form-group">
	      <label>Fecha de pago:</label>
		<input type="date" class="form-control" name="fecha_pago" required>
            </div><hr>
            
            <div class="form-group">
	      <label>Importe Pagado:</label>
		<input type="text" class="form-control" name="importe_pago" required>
            </div><hr>
            
                           
            <button type="submit" class="btn btn-success btn-block" name="addPagoProyecto">
                <img class="img-reponsive img-rounded" src="../icons/devices/media-floppy.png" /> Guardar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


/*
** funcion que agrega Pago de Proyecto
*/
function addPagoProject($cliente,$proyecto,$estado_pago,$fecha_pago,$importe_pago,$conn){

    $sql = "select cliente_nombre, proyecto, fecha_pago from sd_proyectos_pagos where cliente_nombre = '$cliente' or proyecto = '$proyecto' or fecha_pago = $fecha_pago";
    mysqli_select_db($conn,'slack_devel');
    $query = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($query);
    
    
          
    if($rows == 0){
            
           $consulta = "INSERT INTO sd_proyectos_pagos".
            "(cliente_nombre,proyecto,estado_pago,fecha_pago,monto_pago)".
            "VALUES ".
        "('$cliente','$proyecto','$estado_pago','$fecha_pago','$importe_pago')";
        mysqli_select_db($conn,'slack_devel');
        $resp = mysqli_query($conn,$consulta);
            
            if($resp){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Proyecto Agregado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al Agregar el Proyecto. '  .mysqli_error($conn);
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
** formulario para editar pagos en proyectos
*/
function formAddEditPagoProyecto($id,$conn){

        $sql = "select * from sd_proyectos_pagos where id = '$id'";
        mysqli_select_db($conn,'slack_devel');
        $res = mysqli_query($conn,$sql);
        $fila = mysqli_fetch_assoc($res);
         
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../icons/actions/list-add.png" /> Agregar Nuevo Pago de Proyecto</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
	     <input type="hidden" id="id" name="id" value="'.$fila['id'].'" />
            
            <div class="form-group">
		  <label for="sel1">Clientes:</label>
		  <select class="form-control" name="cliente" disabled required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM sd_clientes order by cliente_nombre ASC";
		      mysqli_select_db($conn,'slack_devel');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               echo '<option value="'.$valores[cliente_nombre].'" '.("'.$fila[cliente_nombre].'" == "'.$valores[cliente_nombre].'" ? "selected" : "").'>'.$valores[cliente_nombre].'</option>';
				}
                }
			}

			mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
            
            <div class="form-group">
	      <label>Proyecto:</label>
		<input type="text" class="form-control" name="proyecto" value="'.$fila['proyecto'].'" readonly>
            </div><hr>
            
            <div class="form-group">
            <label for="sel1">Estado Pago:</label>
            <select class="form-control" name="estado_pago">
                <option value="" disabled selected>Seleccionar</option>
                <option value="SI" '.($fila['estado_pago'] == "SI" ? "selected" : ""). '>SI</option>
                <option value="NO" '.($fila['estado_pago'] == "NO" ? "selected" : ""). '>NO</option>
                </select>
            </div><hr>
            
            <div class="form-group">
	      <label>Fecha de pago:</label>
		<input type="date" class="form-control" name="fecha_pago" value="'.$fila['fecha_pago'].'" required>
            </div><hr>
            
            <div class="form-group">
	      <label>Importe Pagado:</label>
		<input type="text" class="form-control" name="importe_pago" value="'.$fila['monto_pago'].'" required>
            </div><hr>
            
                           
            <button type="submit" class="btn btn-success btn-block" name="updatePagoProyecto">
                <img class="img-reponsive img-rounded" src="../icons/devices/media-floppy.png" /> Guardar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


/*
** Función para editar un registro de la tabla normas
*/

function updatePagoProyecto($id,$estado_pago,$fecha_pago,$importe_pago,$conn){

		
	mysqli_select_db($conn,'slack_devel');
	$sqlInsert = "update sd_proyectos_pagos set estado_pago = '$estado_pago', fecha_pago = '$fecha_pago', monto_pago = '$importe_pago' where id = '$id'";
           
	$res = mysqli_query($conn,$sqlInsert);


	if($res){
		echo "<br>";
        echo '<div class="container">';
		echo '<div class="alert alert-success" alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Pago Proyecto Editado Satisfactoriamente.';
		echo "</div>";
		echo "</div>";
	}else{
		echo '<div class="container">';
        echo '<div class="alert alert-warning" alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al Editar el Pago del Proyecto. '  .mysqli_error($conn);
		echo "</div>";
		echo "</div>";
	}
}


?>
