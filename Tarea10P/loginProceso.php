<?php 
	session_start();
	include_once 'model/conexion.php';
	$usuario = $_POST['Username'];
	$contrasena = $_POST['Password'];
	$sentencia = $bd->prepare('select * from usuarios where 
								usuario = ? and contraseña = ?;');
	$sentencia->execute([$usuario, $contrasena]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);

	if ($datos === FALSE) {
		header('Location: login.php');
	}elseif($sentencia->rowCount() == 1){
		$_SESSION['nombre'] = $datos->usuario;
		header('Location: index.php');
	}
?>