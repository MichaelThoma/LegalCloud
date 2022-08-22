<?php 
	session_start();
	if (isset($_SESSION['nombre'])) {
		header('Location: index.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesion</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
		<form method="POST" action="loginProceso.php">
			<label>Usuario: </label>
			<input type="text" name="Username">
			<br>
			<label>Password: </label>
			<input type="password" name="Password">
			<br>
			<input type="submit" value="Iniciar sesión">
		</form>
	</center>
</body>
</html>