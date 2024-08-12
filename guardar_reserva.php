<?php
include "conexion.php";
session_start();

try {
// Verificar envío de formulario
if (isset($_POST['reservar'])) {
	// Recuperar datos del formulario y evitar inyecciones SQL con real_escape_string
	$id_cliente = $conexion->real_escape_string($_POST['id_cliente']);
	$nombre_cliente = $conexion->real_escape_string($_POST['nombre_cliente']);
	$fecha_reserva = $conexion->real_escape_string($_POST['fecha_reserva']);
	$id_vuelo = $conexion->real_escape_string($_POST['id_vuelo']);
	$id_hotel = $conexion->real_escape_string($_POST['id_hotel']);
	
	echo " Datos POST recuperados!!<br>";

	// consulta para verificar reserva existente
	$sql = "SELECT * FROM reserva WHERE id_cliente = ? && fecha_reserva = ?";
	$stmt = $conexion->prepare($sql);
	$stmt->bind_param("is", $id_cliente, $fecha_reserva);
	$stmt->execute();
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		echo "la fecha: ". $fecha_reserva. "<br>" . " está reservada para: ". $nombre_cliente ."<br>";
		echo "$id_cliente";
		echo '<form action = "indice.php">';
        	echo '<button type="submit">Aceptar</button>';
        	echo '</form>';
		$stmt->close();
		exit;
	} else { 		
		// Consulta SQL preparada para crear usuario y evitar inyecciones SQL
		$sql = "INSERT INTO reserva (id_cliente, nombre_cliente, fecha_reserva, id_vuelo, id_hotel) VALUES (?, ?, ?, ?, ?)";
		$consulta = $conexion->prepare($sql);
		$consulta->bind_param('issss', $id_cliente, $nombre_cliente, $fecha_reserva, $id_vuelo, $id_hotel);

		if ($consulta->execute()) {
			echo "RESERVA AGREGADA CON EXITO!";
			echo '<form action = "indice.php">';
        	echo '<button type="submit">Aceptar</button>';
        	echo '</form>';
			}else {
				echo "Hubo un error al realizar la reserva. Verifíque los datos " . $consulta ->error;
			};
}
}
} catch (mysqli_sql_exception $e){
	echo "error: " . $e->getMessage();
	echo '<form action = "indice.php">';
	echo '<button type="submit">Aceptar</button>';
	echo '</form>';

}
?>
