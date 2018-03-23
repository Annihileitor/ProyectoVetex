<?php
include ("../Modelo/conexion.php");

$mail = $_POST['mail'];
$pass = $_POST['pass'];

$query = "SELECT * FROM USUARIO WHERE  Pass='$pass' and Mail='$mail'";

$result = $conn->query($query);

		if($result->num_rows > 0){
			$row=mysqli_fetch_array($result,MYSQLI_NUM);
			if($row[6] == 2){
				header("location:../Vista/Ingresar.html");
			}
			else{
				header("location:../Vista/registrarUsuarios.html");
			}
		}else{
			echo '<script>alert("Error de ingreso.");
				window.location="../Vista/login.html";</script>;';
		}

 ?>
