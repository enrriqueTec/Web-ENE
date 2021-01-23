<?php 
  session_start();

  unset($_SESSION['consulta']);
  
  
  require_once "php/conexion.php";
  $conexion=conexion();
  $sql1="SELECT * from doctores  WHERE especialidad='Cirujano'";
  $sql2="SELECT * from doctores WHERE especialidad='Anestesiologo'";
  $sql3="SELECT * FROM `enfermero`";
  $sql4="SELECT * FROM `enfermero`";
  $sql5="SELECT * FROM `enfermero`";
  $result1=$conexion->query($sql1);
  $result2=$conexion->query($sql2);
  $result3=$conexion->query($sql3);
  $result4=$conexion->query($sql4);
  $result5=$conexion->query($sql5);
   $sql1u="SELECT * from doctores  WHERE especialidad='Cirujano'";
  $sql2u="SELECT * from doctores WHERE especialidad='Anestesiologo'";
  $sql3u="SELECT * FROM `enfermero`";
  $sql4u="SELECT * FROM `enfermero`";
  $sql5u="SELECT * FROM `enfermero`";
  $result1u=$conexion->query($sql1u);
  $result2u=$conexion->query($sql2u);
  $result3u=$conexion->query($sql3u);
  $result4u=$conexion->query($sql4u);
  $result5u=$conexion->query($sql5u);

  
 

 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Cirugias</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">

	<script src="librerias/jquery-3.2.1.min.js"></script>
  <script src="js/funciones.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>
  <script src="librerias/select2/js/select2.js"></script>
</head>
<body>

	<div class="container">
    <div id="buscador"></div>
		<div id="tabla"></div>
	</div>

	<!-- Modal para registros nuevos -->


<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agrega nueva cirugía</h4>
      </div>
      <div class="modal-body">
      <div class="container-fluid">
      <div class="row">
       <div class="col-md-8">
        <label for="">id Cirugia:</label>
      <input type="text" id="id_cirugia" name="" class="form-control input-sm" disabled="disabled">
       </div>
       </div>
       <div class="row">
       <div class="col-md-8">
        <label for="">Nombre:</label>
      <input type="text" id="txt_Nombre_Cirugia" name="" class="form-control input-sm" required="true">
       </div>
       </div>
      
       <div class="row">
       <div class="col-md-8">
         <label for="">Fecha</label>
      <input type="date" id="txt_Fecha_Cirugia" name="" class="form-control input-sm" required="true">
       </div>
       </div>

      
       <div class="row">
       <div class="col-md-6">
        <label for="">Cirujano:</label>
      <select  id="txt_Cirujano" name=""class="form-control" input-sm required="true">
      <option value="0">mostrar todos</option>
      <?php
        foreach ($result1 as $cirujano):
       ?>
        <option value="<?php echo $cirujano[0] ?>">
          <?php echo $cirujano[1]." ".$cirujano[2]." ".$cirujano[3] ?>
        </option>
        
      <?php endforeach; ?>
      </select>
       </div>
       <div class="col-md-6">
        <label for="">Anestesiologo:</label>
      <select  id="txt_Anest" name="" class="form-control" input-sm required="true">
      <option value="0">mostrar todos</option>
      <?php
        foreach ($result2 as $cirujano):
       ?>
        <option value="<?php echo $cirujano[0] ?>">
          <?php echo $cirujano[1]." ".$cirujano[2]." ".$cirujano[3] ?>
        </option>
      <?php endforeach; ?>
      </select>
       </div>
       </div>

       <div class="row">
       <div class="col-md-6">
        <label for="">Enf. Instrume:</label>
      <select  id="txt_Enf1" name=""class="form-control" input-sm required="true">
      <option value="0">mostrar todos</option>
      <?php
        foreach ($result3 as $enf1):
       ?>
        <option value="<?php echo $enf1[0] ?>">
          <?php echo $enf1[1]." ".$enf1[2]." ".$enf1[3] ?>
        </option>
        
      <?php endforeach; ?>
      </select>
       </div>

       <div class="col-md-6">
         <label for="">Enf. Circulan 1:</label>
      <select  id="txt_Enf2" name=""class="form-control" input-sm required="true">
      <option value="0">mostrar todos</option>
      <?php
        foreach ($result4 as $enf2):
       ?>
        <option value="<?php echo $enf2[0] ?>">
          <?php echo $enf2[1]." ".$enf2[2]." ".$enf2[3] ?>
        </option>
        
      <?php endforeach; ?>
      </select>

       </div>
       </div>

       <div class="row">
       <div class="col-md-6">
        <label for="">Enf. circulan 2:</label>
      <select  id="txt_Enf3" name=""class="form-control" input-sm required="true">
      <option value="0">mostrar todos</option>
      <?php
        foreach ($result5 as $enf3):
       ?>
        <option value="<?php echo $enf3[0] ?>">
          <?php echo $enf3[1]." ".$enf3[2]." ".$enf3[3] ?>
        </option>
        
      <?php endforeach; ?>
      </select>
       </div>


       <div class="col-md-6">
       <label for="">Sala</label>
       <select id="txt_Sala" name=""class="form-control" input-sm required="true">
       <option value="1">1</option>
       <option value="2">2</option>
       
       </select>
       </div>
       </div>

       <div class="row">
       <div class="col-md-6">
        <label for="">Hora Inicio</label>
        <input type="time" name="" id="txt_hr_inicio" class="form-control input-sm" required="true">
       </div>

       <div class="col-md-6">
       <label for="">Hora Fin</label>
        <input type="time" name="" id="txt_hr_fin" class="form-control input-sm"required="true">
       </div>
       </div>
      </div>
     
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
        Agregar
        </button>
       
      </div>
    </div>
  </div>
</div>

<!-- Modal para edicion de datos -->

<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
      </div>
      <div class="modal-body">
      <div class="container-fluid">
      <div class="row">
       <div class="col-md-8">
        <label for="">id Cirugia:</label>
      <input type="text" id="id_cirugia_up" name="" class="form-control input-sm" disabled="disabled">
       </div>
       </div>
       <div class="row">
       <div class="col-md-8">
        <label for="">Nombre:</label>
      <input type="text" id="txt_Nombre_Cirugia_up" name="" class="form-control input-sm" required="true">
       </div>
       </div>
      
       <div class="row">
       <div class="col-md-8">
         <label for="">Fecha</label>
      <input type="date" id="txt_Fecha_Cirugia_up" name="" class="form-control input-sm" required="true">
       </div>
       </div>

      
       <div class="row">
       <div class="col-md-6">
        <label for="">Cirujano:</label>
      <select  id="txt_Cirujano_up" name=""class="form-control" input-sm required="true">
      
      <?php
        foreach ($result1u as $cirujanou):
       ?>
        <option value="<?php echo $cirujano[0] ?>">
          <?php echo $cirujanou[1]." ".$cirujanou[2]." ".$cirujanou[3] ?>
        </option>
        
      <?php endforeach; ?>
      </select>
       </div>
       <div class="col-md-6">
        <label for="">Anestesiologo:</label>
      <select  id="txt_Anest_up" name="" class="form-control" input-sm required="true">
      
      <?php
        foreach ($result2u as $cirujanou):
       ?>
        <option value="<?php echo $cirujano[0] ?>">
          <?php echo $cirujanou[1]." ".$cirujanou[2]." ".$cirujanou[3] ?>
        </option>
      <?php endforeach; ?>
      </select>
       </div>
       </div>

       <div class="row">
       <div class="col-md-6">
        <label for="">Enf. Instrume:</label>
      <select  id="txt_Enf1_up" name=""class="form-control" input-sm required="true">
      
      <?php
        foreach ($result3u as $enf1u):
       ?>
        <option value="<?php echo $enf1[0] ?>">
          <?php echo $enf1u[1]." ".$enf1u[2]." ".$enf1u[3] ?>
        </option>
        
      <?php endforeach; ?>
      </select>
       </div>

       <div class="col-md-6">
         <label for="">Enf. Circulan 1:</label>
      <select  id="txt_Enf2_up" name=""class="form-control" input-sm required="true">
      
      <?php
        foreach ($result4u as $enf2u):
       ?>
        <option value=" <?php echo $enf2[0] ?>">
         <?php echo $enf2u[1]." ".$enf2u[2]." ".$enf2u[3] ?>
        </option>
        
      <?php endforeach; ?>
      </select>

       </div>
       </div>

       <div class="row">
       <div class="col-md-6">
        <label for="">Enf. circulan 2:</label>
      <select  id="txt_Enf3_up" name=""class="form-control" input-sm  required="true">
      
      <?php
        foreach ($result5u as $enf3u):
       ?>
        <option value="<?php echo $enf3[0] ?>">
          <?php echo $enf3u[1]." ".$enf3u[2]." ".$enf3u[3] ?>
        </option>
        
      <?php endforeach; ?>
      </select>
       </div>


       <div class="col-md-6">
       <label for="">Sala</label>
       <select id="txt_sala_up" name=""class="form-control" input-sm required="true">
       <option value="1">1</option>
       <option value="2">2</option>
       
       </select>
       </div>
       </div>

       <div class="row">
       <div class="col-md-6">
        <label for="">Hora Inicio</label>
        <input type="time" name="" id="txt_hr_inicio_up" class="form-control input-sm" required="true">
       </div>

       <div class="col-md-6">
       <label for="">Hora Fin</label>
        <input type="time" name="" id="txt_hr_fin_up" class="form-control input-sm"required="true">
       </div>
       </div>
      </div>
     
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
        
      </div>
    </div>
  </div>
</div>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla').load('componentes/tabla.php');
    $('#buscador').load('componentes/buscador.php');
	});
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#guardarnuevo').click(function(){
          id_cirugia=$('#id_cirugia').val();
          txt_Nombre_Cirugia=$('#txt_Nombre_Cirugia').val();
          txt_Fecha_Cirugia=$('#txt_Fecha_Cirugia').val();
          txt_Cirujano=$('#txt_Cirujano').val();
          txt_Anest=$('#txt_Anest').val();
          txt_Enf1=$('#txt_Enf1').val();
          txt_Enf2=$('#txt_Enf2').val();
          txt_Enf3=$('#txt_Enf3').val();
          txt_Sala=$('#txt_Sala').val();
          txt_hr_inicio=$('#txt_hr_inicio').val();
          txt_hr_fin=$('#txt_hr_fin').val();
            agregardatos(id_cirugia,txt_Nombre_Cirugia,txt_Fecha_Cirugia,txt_Cirujano,txt_Anest,txt_Enf1,txt_Enf2,txt_Enf3,txt_Sala,txt_hr_inicio,txt_hr_fin);
        });



        $('#actualizadatos').click(function(){
          txt_Enf2_up=$('txt_Enf2_up').val();
          alertify.success(txt_Enf2_up);
          
          actualizaDatos();
        });

    });
</script>