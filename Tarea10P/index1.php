<?php 
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: login.php');
}elseif(isset($_SESSION['nombre'])){
 include 'model/conexion.php';
		$sentencia = $bd->query("SELECT * FROM clientes;");
		$clientes = $sentencia->fetchAll(PDO::FETCH_OBJ);
	}else{
		echo "Error en el sistema";
	}
        ?>

        <!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista de clientes</title>
	<meta charset="utf-8">

	<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}
.active {
    background-color: #4CAF50;
}
li {
    border-right: 1px solid #bbb;
}

li:last-child {
    border-right: none;
}

table#T01 {
    width:100%;
}
table#T01, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
table#T01, th, td {
    padding: 5px;
    text-align: left;
}
table#T01 tr:nth-child(even) {
    background-color: #eee;
}
table#T01 tr:nth-child(odd) {
   background-color:#fff;
}
table#T01 th	{
    background-color: black;
    color: white;
}
</style>
</head>
<body>
	<center>
	<div id="header">
			<ul class="nav">
				<li><a href="http://localhost/Tarea10P/index.php">Gestor de casos</a></li>
				<li><a href="http://localhost/Tarea10P/index1.php">Gestor de Clientes</a>
				<li style="float:right"><a class="active" href="cerrar.php">Cerrar Sesión</a></li>

			</ul>
		</div>
	<h1>Bienvenido: <?php echo $_SESSION['nombre'] ?></h1>
		<h3>Reporte de Clientes</h3>
		<table id= "T01">
			<tr >
				<th>Id</th>
				<th>Cedula</th>
				<th>nombre</th>
				<th>Apellido</th>
				<th>Correo</th>
				<th>Telefono</th>
				<th>Celular</th>
                <th>Direccion</th>
                <th>Estado Civil</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>

			<?php 
				foreach ($clientes as $dato) {
					?>
					<tr>
						<td><?php echo $dato->Id_Cliente; ?></td>
						<td><?php echo $dato->Cedula; ?></td>
						<td><?php echo $dato->Nombre; ?></td>
						<td><?php echo $dato->Apellido; ?></td>
						<td><?php echo $dato->Correo; ?></td>
						<td><?php echo $dato->Telefono; ?></td>
						<td><?php echo $dato->Celular ?></td>
                        <td><?php echo $dato->Direccion ?></td>
                        <td><?php echo $dato->Estado_Civil ?></td>
						<td><a href="editar1.php?id=<?php echo $dato->Id_Cliente; ?>">Editar</a></td>
						<td><a href="eliminar1.php?id=<?php echo $dato->Id_Cliente; ?>">Eliminar</a></td>
					</tr>
					<?php
				}
			?>
            </table>

            	<!-- inicio insert -->
		<hr>
		<h3>Ingresar clientes:</h3>
		<form method="POST" action="insertar1.php">
			<table id="T02">
				<tr>
				
                    <input type="number" name="Cedula" id="" placeholder="Cedula">
				</tr>
				<tr>
					<
                    <input  type="text" name="Nombre" id="" placeholder="Nombre">   				<tr>
					
                    <input type="text" name="Apellido" id="" placeholder="Apellido">  
				</tr>
                <input type="email" name="Correo" id="" placeholder="Correo">
				<tr>

                    <input type="tel" name="Telefono" id="" placeholder="Telefono">   	
		
                    <input type="tel" name="Celular" id="" placeholder="Celular">   	
			
               <input type="text" name="Direccion" id="" placeholder="Direccion">  
                

                <tr>
				
                  <select name="Estado_Civil" id="">
                        <option> Estado Civil </option>
                        <option value="Soltero">Soltero</option>
                        <option value="Casado">Casado</option>
                  </select>
				</tr>
				<input type="hidden" name="oculto" value="1">
				<tr>
					<td><input type="reset" name=""></td>
					<td><input type="submit" value="Registrar Cliente"></td>
				</tr>
			</table>
		</form>
		<!-- fin insert-->

	</center>
</body>
</html>