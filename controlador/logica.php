<?php

var_dump($_POST);

$conexion = new PDO('pgsql:host=dpg-d8f39f553gjs739kr4mg-a.oregon-postgres.render.com;dbname=practica_sovw','practica_sovw_user','cdfeR6wk4p1M7xvDQhLPIXPx2OeOYZWq');
$registrar = $conexion->prepare("INSERT INTO aprendizes (nombre,telefono,detalles) VALUES (?, ?, ?)");
$registrar->execute([$_POST["nom"], $_POST["tel"], $_POST["det"]]);
echo "<p style='color:white;background-color:green;font-family:calibri,arial;font-size:24px;text-align:center'>Registro exitoso</p>";

$consulta = $conexion->prepare("SELECT * FROM aprendizes order by id");
$consulta->execute();
$tabla = $consulta->fetchAll(PDO::FETCH_ASSOC);	      //PDO::FETCH_NUM
$conexion = null;

echo "<table><tr><th>Codigo</th>
                 <th>Nombre completo</th>
                 <th>Contacto</th>
			     <th>Detalles</th>		</tr>";
foreach($tabla as $fila){		//Recorre el arreglo $tabla como FETCH_NUM
    echo "<tr>		<td>$fila[id]</td>
            		<td>$fila[nombre]</td>
            		<td>$fila[telefono]</td>
            		<td>$fila[detalles]</td>		</tr>";
}
echo "</table>";



?>
