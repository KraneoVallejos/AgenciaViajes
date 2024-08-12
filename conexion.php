<?php
define("SERVIDOR", "localhost");
define("USUARIO", "root");
define("PASSWORD", "");
define("BD", "agencia");

//generar conexión
$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BD);

// Verificar la conexión
if ($conexion->connect_error) {
	die("Error de conexión a la base de datos: " . $conexion->connect_error);
} else {
	echo "conexion establecida";
};

?>
