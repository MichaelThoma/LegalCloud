<?php  
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include 'model/conexion.php';
	$fecha = $_POST['fecha'];
	$cliente = $_POST['cliente'];
	$tipo_de_caso = $_POST['tipo_de_caso'];
	$Descripcion = $_POST['Descripcion'];
	$Abogado = $_POST['Abogado'];
    $Estado = $_POST['Estado'];

	$sentencia = $bd->prepare("INSERT INTO casos(Fecha,Cliente,Tipo_de_caso,Descripcion,Abogado_Asignado,Estado) VALUES (?,?,?,?,?,?);");
	$resultado = $sentencia->execute([$fecha,$cliente,$tipo_de_caso,$Descripcion,$Abogado,$Estado]);

	if ($resultado === TRUE) {
	
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>