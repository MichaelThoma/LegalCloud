<?php 

	if (!isset($_POST['oculto'])) {
		header('Location: index1.php');
	}

	include 'model/conexion.php';
	$Id_Cliente2 = $_POST['Id_Cliente2'];
    $Cedula2 = $_POST['Cedula2'];
	$Nombre2 = $_POST['Nombre2'];
	$Apellido2 = $_POST['Apellido2'];
	$Correo2 = $_POST['Correo2'];
	$Telefono2 = $_POST['Telefono2'];
	$Celular2 = $_POST['Celular2'];
    $Direccion2 = $_POST['Direccion2'];
    $Estado_Civil2 = $_POST['Estado_Civil2'];

	$sentencia = $bd->prepare("UPDATE clientes SET Cedula = ?, Nombre = ?, 
												Apellido = ?, Correo = ?,  Telefono = ?, 
                                                Celular = ?, Direccion = ?, Estado_Civil = ? WHERE Id_Cliente = ?;");
	$resultado = $sentencia->execute([$Cedula2,$Nombre2,$Apellido2,$Correo2,$Telefono2,$Celular2,$Direccion2,$Estado_Civil2,$Id_Cliente2]);

	if ($resultado === TRUE) {
		header('Location: index1.php');
	}else{
		echo "Error";
	}
?>