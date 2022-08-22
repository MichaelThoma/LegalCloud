<?php  
	session_start();
	if (!isset($_GET['id'])) {
		header('Location: index.php');
	}

	


	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'model/conexion.php';
		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM clientes WHERE Id_Cliente = ?;");
		$sentencia->execute([$id]);
		$persona = $sentencia->fetch(PDO::FETCH_OBJ);

	}else{
		echo "Error en el sistema";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Cliente</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
		<h3>Editar Cliente:</h3>
		<form method="POST" action="editarProceso1.php">
			<table>
				<tr>
					<td>Cedula: </td>
					<td><input type="number" name="Cedula2" value="<?php echo $persona->Cedula; ?>"></td>
				</tr>
				<tr>
					<td>Nombre: </td>
					<td><input type="text" name="Nombre2" value="<?php echo $persona->Nombre; ?>"></td>
				</tr>
				<tr>
					<td>Apellido: </td>
					<td><input type="text" name="Apellido2" value="<?php echo $persona->Apellido; ?>"></td>
				</tr>
				<tr>
					<td>Correo: </td>
					<td><input type="email" name="Correo2" value="<?php echo $persona->Correo; ?>"></td>
				</tr>
				<tr>
					<td>Telefono: </td>
					<td><input type="Tel" name="Telefono2" value="<?php echo $persona->Telefono; ?>"></td>
				</tr>
				<tr>
					<td>Celular: </td>
					<td><input type="Tel" name="Celular2" value="<?php echo $persona->Celular; ?>"></td>
				</tr>
				<tr>
					<td>Direccion: </td>
					<td><input type="text" name="Direccion2" value="<?php echo $persona->Direccion; ?>"></td>
				</tr>
				<tr>
					<td>Estado Civil: </td>
					<td> <select name="Estado_Civil2" id="">
                        <option value="Soltero">Soltero</option>
                        <option value="Casado">Casado</option>
                  </select> value="<?php echo $persona->Estado_Civil; ?>"></td>
				
				</tr>
				<tr>
					<input type="hidden" name="oculto">
					<input type="hidden" name="Id_Cliente2" value="<?php echo $persona->Id_Cliente; ?>">
					<td colspan="2"><input type="submit" value="EDITAR CLIENTE"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>