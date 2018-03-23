<?php
require '../Modelo/conexion.php';
//Datos del dueño
$nom = $_POST['nombreD'];
$ape = $_POST['apellidoD'];
$mail = $_POST['emailD'];
$direccion = $_POST['direccionD'];
$telefono=$_POST['numberD'];

//Datos mascota
$nombre = $_POST['nombreM'];
$especie = $_POST['especieM'];
$raza = $_POST['razaM'];
$edad = $_POST['edadM'];
$sexo = $_POST['sexoM'];
$color = $_POST['colorM'];
$peso = $_POST['pesoM'];

//Datos Medicos
$sintomas = $_POST['Sintomas'];
$diagnostico = $_POST['Diagnostico'];
$tratamiento = $_POST['Tratamiento'];
$indicaciones = $_POST['Indicaciones'];
$sistema = $_POST['Sistema'];
$estado = 2;
$usuario = 5;
$ultimoDue ="";
if(isset($_POST['ingresar']))
{
  $sqlDue = "INSERT INTO dueno (NOMBRE,APELLIDO,DIRECCION,Telefono,CORREO) VALUES ('$nom','$ape','$direccion','$telefono','$mail')";

  if ($conn->query($sqlDue) === TRUE) {
     	$ultimoDue = mysqli_insert_id($conn);

      $queryMas = "INSERT INTO mascota (dueno,Nombre,raza,Especie,Sexo,Edad,Color,peso) VALUES('$ultimoDue','$nombre','$raza','$especie','$sexo','$edad','$color','$peso')";

      if ($conn->query($queryMas) === TRUE) {
        $ultimoMas = mysqli_insert_id($conn);
      }
      else{
         	echo '<script>alert("La inserción no se realizó.");
            </script>;';
          echo "Error: " . $queryMas . "<br>" . $conn->error;
      }
      $queryFicha = "INSERT INTO ficha_medica (Indicaciones,Tratamiento,Diagnostico,Sistema_Afectado,Sintomas,Usuario_idUsuario,MASCOTA_idMASCOTA,dueno,Estado_idEstado) VALUES ('$indicaciones','$tratamiento','$diagnostico','$sistema','$sintomas','$usuario','$ultimoMas','$ultimoDue','$estado')";
      if ($conn->query($queryFicha) === TRUE) {
        //Exito
        echo '<script>alert("Ficha agregada correctamente.");

          window.location="../vista/ingresar.html";</script>;';
      }
      else{
        echo '<script>alert("La inserción no se realizó.");
          </script>;';
          echo "Error: " . $queryFicha . "<br>" . $conn->error;
      }
  }else{
      echo '<script>alert("La inserción no se realizó.");
        </script>;';
      echo "Error: " . $sqlDue . "<br>" . $conn->error;
  }
}
mysqli_close($conn);
?>
