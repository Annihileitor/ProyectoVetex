<?php
  require '../Modelo/conexion.php';

  $nombres = $_POST['nombres'];
  $apellidos = $_POST['apellidos'];
  $especialidad = $_POST['especialidad'];
  $email = $_POST['email'];
  $contraseña = $_POST['password'];
  $rol = 2;

  if(isset($_POST['ingresar']))
{
    if($_POST['email'] == '' or $_POST['password'] == '' or $_POST['repassword'] == ''){
        echo '<script>alert("Por favor llene todos los campos.");
          window.location="../Vista/registrarUsuarios.html";</script>;';


    }
    else{
        $sql = "SELECT mail FROM usuario WHERE mail = '$email'";
        $rec = $conn->query($sql);
        $count = mysqli_num_rows($rec);

        if($count == 0){
            if($_POST['password'] == $_POST['repassword'])
            {

                $sql = "INSERT INTO usuario (nombre,apellido,Mail,pass,especialidad,ROL_idROL) VALUES ('$nombres','$apellidos','$email','$contraseña','$especialidad','$rol')";

                if ($conn->query($sql) === TRUE) {
                    echo '<script>alert("Usuario registrado correctamente.");
                      window.location="../index.html";</script>;';
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            else{

                echo '<script>alert("Las contraseñas deben ser iguales.");

                  window.location="../Vista/registrarUsuarios.html";

                </script>;';
            }
        }
        else {
          echo '<script>alert("El Mail de Usuario ya a sido tomado.");

            window.location="../Vista/registrarUsuarios.html";</script>';
          }
    }
}
mysqli_close($conn);
?>
