<?php 
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: login.php');
}elseif(isset($_SESSION['nombre'])){
 include 'model/conexion.php';
		$sentencia = $bd->query("SELECT * FROM casos;");
		$casos = $sentencia->fetchAll(PDO::FETCH_OBJ);
	}else{
		echo "Error en el sistema";
	}
        ?>

        <!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista de alumnos</title>
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
			<td></td>
			<td></td>
		</div>
	<h1>Bienvenido: <?php echo $_SESSION['nombre'] ?></h1>
		<h3>Reporte de Casos</h3>
		<table id= "T01">
			<tr>
				<th>Id</th>
				<th>fecha</th>
				<th>Cliente</th>
				<th>Tipo de caso</th>
				<th>Descripcion</th>
				<th>Abogado Asignado</th>
				<th>Estado</th>
				<th>Configuracion</th>
				<th>Eliminar</th>
			</tr>

			<?php 
				foreach ($casos as $dato) {
					?>
					<tr>
						<td><?php echo $dato->Id_Casos; ?></td>
						<td><?php echo $dato->Fecha; ?></td>
						<td><?php echo $dato->Cliente; ?></td>
						<td><?php echo $dato->Tipo_de_caso; ?></td>
						<td><?php echo $dato->Descripcion; ?></td>
						<td><?php echo $dato->Abogado_Asignado; ?></td>
						<td><?php echo $dato->Estado ?></td>
						<td><a href="editar.php?id=<?php echo $dato->Id_Casos; ?>">Configuracion</a></td>
						<td><a href="eliminar.php?id=<?php echo $dato->Id_Casos; ?>">Eliminar</a></td>
					</tr>
					<?php
				}
			?>
            </table>

            	<!-- inicio insert -->
		<hr>
		<h3>Ingresar casos:</h3>
		<form method="POST" action="insertar.php">
			<table id="T02">
				<tr>
				
                    <input type="date" name="fecha" id="" >
				</tr>
				<tr>
					
                    <select name="cliente" id="cliente" >
                      <?php
					  $clientequery = "SELECT * from clientes";

					  $run = mysqli_query($conn, $clientequery) or die(mysqli_error($conn));
					  if ($run) {
						  while ($valores = mysqli_fetch_array($run)) {
							  $Nombre = $Nombre;
							  echo '<option value="'.$Nombre.'">'.$Nombre.'</option>'; 
						  }
					  }
					  ?>
                   </select>    
                 </select>  
                 </select>    				<tr>
					
                  <select name="tipo_de_caso" id="" >
                        <option> Selecciona el tipo de caso </option>
                        <option value="Robo">Robo</option>
                        <option value="Atraco">Atraco</option>
                        <option value="Homicidio">Homicidio</option>
                 </select>    
				</tr>
				<tr>
					
					<input type="text" name="Descripcion" placeholder="Descripcion">
				</tr>
				<tr>
					
                    <select name="Abogado" id="" >
                        <option> Selecciona un abogado </option>
                        <option value="Leo">Leo</option>
                        <option value="Jose">Jose</option>
                 </select>    	
				</tr>
              
                    <select name="Estado" id="" >
                        <option> Estado </option>
                        <option value="Completado">Completado</option>
                        <option value="En progreso">En progreso</option>
                        <option value="Faltante">Faltante</option>
                 </select>    	
				<input type="hidden" name="oculto" value="1">
				<tr>
					<td><input type="reset" name=""></td>
					<td><input type="submit" value="Registrar Caso"></td>
				</tr>
			</table>
		</form>
		<!-- fin insert-->

	</center>
</body>
</html>

