<?php 

	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	include 'model/conexion.php';
	$Id_Casos2 = $_POST['Id_Casos2'];
	$Fecha2 = $_POST['fecha2'];
	$Cliente2 = $_POST['cliente2'];
	$Tipo_de_caso2 = $_POST['tipo_de_caso2'];
	$Descripcion2 = $_POST['Descripcion2'];
	$Abogado_Asignado2 = $_POST['Abogado2'];
	$Estado2 = $_POST['Estado2'];

	$sentencia = $bd->prepare("UPDATE casos SET Fecha = ?, Cliente = ?, Tipo_de_caso = ?, 
												Descripcion = ?, Abogado_Asignado = ?, Estado = ? WHERE id_Casos = ?;");
	$resultado = $sentencia->execute([$Fecha2,$Cliente2,$Tipo_de_caso2,$Descripcion2,$Abogado_Asignado2,$Estado2,$Id_Casos2]);

	if ($resultado === TRUE) {
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>