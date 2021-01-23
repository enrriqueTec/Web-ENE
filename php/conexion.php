

<?php 
		
function conexion(){
$host="localhost";
$user="root";
$password="";
$db="bd_clinica";

			$conexion= new PDO('mysql:host='.$host.'; dbname='.$db, $user, $password);

			return $conexion;
		}

 ?>