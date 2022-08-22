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

		$sentencia = $bd->prepare("SELECT * FROM casos WHERE Id_Casos = ?;");
		$sentencia->execute([$id]);
		$persona = $sentencia->fetch(PDO::FETCH_OBJ);

	}else{
		echo "Error en el sistema";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Configuracion</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
		
		<h3>Info del Caso:</h3>
		<form method="POST" action="editarProceso.php">
			<table>
				<tr>
					<td>fecha: </td>
					<td><input type="date" name="fecha2" id="" value="<?php echo $persona->Fecha; ?>"></td>
				</tr>
				<tr>
					<td>Cliente: </td>
					<td> <select name="cliente2" id="" >
                        <option value="Bartolomeo">Bartolomeo</option>
                        <option value="michael">michael</option>
						<option value="Tonto">Tonto</option>
                   </select>   value="<?php echo $persona->Cliente; ?>"></td>
				</tr>
				<tr>
					<td>Tipo de caso: </td>
					<td> <select name="tipo_de_caso2" id="" >
                        <option value="Robo">Robo</option>
                        <option value="Atraco">Atraco</option>
                        <option value="Homicidio">Homicidio</option>
                 </select>     value="<?php echo $persona->Tipo_de_caso; ?>"></td>
				</tr>
				<tr>
					<td>Descripcion: </td>
					<td><input type="text" name="Descripcion2" value="<?php echo $persona->Descripcion; ?>"></td>
				</tr>
				<tr>
					<td>Abogado Asignado: </td>
					<td>   <select name="Abogado2" id="" >
                        <option> Selecciona un abogado </option>
                        <option value="Leo">Leo</option>
                        <option value="Jose">Jose</option>
                 </select>   value="<?php echo $persona->Abogado_Asignado; ?>"></td>
				</tr>
				<tr>
					<td>Estado: </td>
					<td><select name="Estado2" id="" >
                        <option> Estado </option>
                        <option value="Completado">Completado</option>
                        <option value="En progreso">En progreso</option>
                        <option value="Faltante">Faltante</option>
                 </select>     value="<?php echo $persona->Estado; ?>"></td>
				</tr>
				<tr>
					<input type="hidden" name="oculto">
					<input type="hidden" name="Id_Casos2" value="<?php echo $persona->Id_Casos; ?>">
					<td colspan="2"><input type="submit" value="EDITAR CASO"></td>
					<td coldspan="2"> <input type="button" value="Imprimir" onclick="window.print()"></td>

				</tr>
			</table>
		</form>
	</center>
</body>
</html>