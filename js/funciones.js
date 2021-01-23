

function agregardatos(id_cirugia,txt_Nombre_Cirugia,txt_Fecha_Cirugia,txt_Cirujano,txt_Anest,txt_Enf1,txt_Enf2,txt_Enf3,txt_Sala,txt_hr_inicio,txt_hr_fin){

	cadena="id_cirugia=" + id_cirugia +
			"&txt_Nombre_Cirugia=" + txt_Nombre_Cirugia + 
			"&txt_Fecha_Cirugia=" + txt_Fecha_Cirugia +
			"&txt_Cirujano=" + txt_Cirujano +
			"&txt_Anest=" + txt_Anest +
			"&txt_Enf1=" + txt_Enf1 +
			"&txt_Enf2=" + txt_Enf2 +
			"&txt_Enf3=" + txt_Enf3 +
			"&txt_Sala=" + txt_Sala+
			"&txt_hr_inicio=" + txt_hr_inicio+
			"&txt_hr_fin="+txt_hr_fin;

	$.ajax({
		type:"POST",
		url:"php/agregarDatos.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('componentes/tabla.php');
				 $('#buscador').load('componentes/buscador.php');
				alertify.success("agregado con exito");
			}else{
				$('#tabla').load('componentes/tabla.php');
				 $('#buscador').load('componentes/buscador.php');
				
			}
		}
	});

}

function agregaform(datos){

	d=datos.split('||');
	 $('#id_cirugia_up').val(d[0]);
	 $('#txt_Nombre_Cirugia_up').val(d[1]);
     $('#txt_Fecha_Cirugia_up').val(d[2]);
     $('#txt_Cirujano_up').val(d[3]);
     $('#txt_Anest_up').val(d[4]);
     $('#txt_Enf1_up').val(d[5]);
     $('#txt_Enf2_up').val(d[6]);
     $('#txt_Enf3_up').val(d[7]);
     $('#txt_Sala_up').val(d[8]);
     $('#txt_hr_inicio_up').val(d[9]);
     $('#txt_hr_fin_up').val(d[10]);
	
}

function actualizaDatos(){
       

          id_cirugia_up=$('#id_cirugia_up').val();
		  txt_Nombre_Cirugia_up=$('#txt_Nombre_Cirugia_up').val();
		  txt_Fecha_Cirugia_up=$('#txt_Fecha_Cirugia_up').val();
          txt_Cirujano_up=$('#txt_Cirujano_up').val();
          txt_Anest_up=$('#txt_Anest_up').val();
          txt_Enf1_up=$('#txt_Enf1_up').val();
          txt_Enf2_up=$('#txt_Enf2_up').val();
          txt_Enf3_up=$('#txt_Enf3_up').val();
          txt_Sala_up=$('#txt_Sala_up').val();
          txt_hr_inicio_up=$('#txt_hr_inicio_up').val();
          txt_hr_fin_up=$('#txt_hr_fin_up').val();
	

	cadena= "id_cirugia_up=" + id_cirugia_up +
			"&txt_Nombre_Cirugia_up=" + txt_Nombre_Cirugia_up + 
			"&txt_Fecha_Cirugia_up=" + txt_Fecha_Cirugia_up +
			"&txt_Cirujano_up=" +  txt_Cirujano_up +
			"&txt_Anest_up=" + txt_Anest_up +
			"&txt_Enf1_up=" + txt_Enf1_up +
			"&txt_Enf2_up=" + txt_Enf2_up +
			"&txt_Enf3_up=" + txt_Enf3_up +
			"&txt_Sala_up=" + txt_Sala_up +
			"&txt_hr_inicio_up=" + txt_hr_inicio_up +
			"&txt_hr_fin_up=" + txt_hr_fin_up;

	$.ajax({
		type:"POST",
		url:"php/actualizaDatos.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('componentes/tabla.php');
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Falló Actualización");
			}
		}
	});

}

function preguntarSiNo(id_cirugia){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatos(id_cirugia) }
                , function(){ alertify.error('Se canceló eliminación')});
}

function eliminarDatos(id_cirugia){

	cadena="id_cirugia=" + id_cirugia;

		$.ajax({
			type:"POST",
			url:"php/eliminarDatos.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('componentes/tabla.php');
					$('#buscador').load('componentes/buscador.php');
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Falló eliminación");
				}
			}
		});
}