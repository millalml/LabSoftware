<?php
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

//Conectar a la BD
$conexion=mysql_connect("localhost", "root", "", "labsoft_bd");
$consulta="SELECT * FROM usuario WHERE usuario='$usuario' and password='$password'";
$resultado=mysql_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if ($filas>0){
	header("location:Bienvenidos.html");
}
else {
	echo "Error en la autentificacion";
}
mysqli_free_result($resultado);
mysqli_close($conexion);