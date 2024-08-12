<?php
include "conexion.php";
session_start();

try {
// Verificar si se ha enviado el formulario
if (isset($_POST['destino'])) {
    // Recuperar datos del formulario y evitar inyecciones SQL con real_escape_string
    $destino = $conexion->real_escape_string($_POST["destino"]);
    $sql = "SELECT * FROM hotel WHERE ubicacion=?";
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param('s', $destino);
    $consulta->execute();
    $result = $consulta->get_result();
    
    // si la verificación resulta correcta se redirige a página de bienvenida
    if ($result->num_rows > 0) {
        
        echo '<table> 
        <tr>
        <th>DESTINO</th>
        <th>HOTEL</th>
        <th>HABITACIONES<br>DISPONIBLES</th>
        <th>TARIFA<br>NOCHE</th>
        </tr>';
        // Iterar sobre cada fila de resultados
        $fila = $result->fetch_assoc();
        echo '<tr>';
        echo '<td>' . $fila['ubicacion'] . '</td>';
        echo '<td>' . $fila['nombre'] . '</td>';
        echo '<td>' . $fila['habitaciones_disponibles'] . '</td>';
        echo '<td>' . $fila['tarifa_noche'] . '</td>';
         echo '</tr>';
        echo '</table>';

        echo '<table>
        <tr>
        <th><h2>INGRESE SUS DATOS</h2></th>
        </tr>';
         echo '<td> 
        <form id="reservar" name="reservar" method="post" action = "guardar_reserva.php" >
        <input type= "hidden" name = "ubicacion" value = "'.htmlspecialchars($fila['ubicacion']).'">
        <input type= "hidden" name = "nombre" value = "'.htmlspecialchars($fila['nombre']).'">
        <input type= "hidden" name = "id_hotel" value = "'.htmlspecialchars($fila['id_hotel']).'">
        <label for="id_cliente" >INGRESE SU DNI</label><br>
        <input type="text" id="id_cliente" name="id_cliente" required>
        <br>
        <label for="nombre_cliente" >NOMBRE COMPLETO</label><br>
        <input type="text" id="nombre_cliente" name="nombre_cliente" required>
        <br>
        <label for="id_vuelo" >INGRESE CÓDIGO DE VUELO</label><br>
        <input type="text" id="id_vuelo" name="id_vuelo" required></input>
        <br>
        <label for="fecha_reserva" >FECHA RESERVA</label><br>
        <input type="date" id="fecha_reserva" name="fecha_reserva"required></input>
        
        <br>
        <button type="submit" name = "reservar" id="reservar">RESERVAR</button>
        </form>
        <form action = "indice.php">
	    <button type="submit">CAMBIAR DESTINO</button>
	    </form>

        </td>';
        echo '</tr>';
    
        echo '</table>';
        //header("Location: Clase_Destino.php");
        // si no se concreta la verificación arrojará mensaje de error.
    } else {
        $error = "Datos incorrectos!";
        echo ($error);
        //sleep(3);
        //	header("Location: indice_Agencia_Viajes.html");
        exit;
    }
}
} catch (mysqli_sql_exception $e){
	echo "error: " . $e->getMessage();
	echo '<form action = "indice.php">';
	echo '<button type="submit">Aceptar</button>';
	echo '</form>';

}
?>

