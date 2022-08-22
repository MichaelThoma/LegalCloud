<?php  
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include 'model/conexion.php';
	$Cedula = $_POST['Cedula'];
	$Nombre = $_POST['Nombre'];
	$Apellido = $_POST['Apellido'];
	$Correo = $_POST['Correo'];
	$Telefono = $_POST['Telefono'];
    $Celular = $_POST['Celular'];
    $Direccion = $_POST['Direccion'];
    $Estado_Civil = $_POST['Estado_Civil'];

	$sentencia = $bd->prepare("INSERT INTO clientes(Cedula,Nombre,Apellido,Correo,Telefono,Celular,Direccion,Estado_Civil) VALUES (?,?,?,?,?,?,?,?);");
	$resultado = $sentencia->execute([$Cedula,$Nombre,$Apellido,$Correo,$Telefono,$Celular,$Direccion,$Estado_Civil]);

	if ($resultado === TRUE) {
		header('Location: index1.php');
	}else{
		echo "Error";
	}
?>