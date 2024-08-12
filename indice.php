<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_Agencia_Viajes.css">
    <title>Agencia de Viajes</title>
</head>

<body id="cuerpo">

    <script>
        let body = document.body;
        body.style.backgroundImage = "url('https://tecnosoluciones.com/wp-content/uploads/2020/06/ecommerce-para-agencias-de-viajes.jpg')";
    </script>

    <h1 id="cabecera">AGENCIA DE VIAJES</h1>
    <p id="comentario">Hola somos una agencia de viajes seria</p>
    <form method="post">
        <div>
            <label id="etiqueta" for="orden">COMO DESEA ORDENAR LA LISTA?</label><br>

            <button type="submit" name="orden" value="ubicacion" >Pais</button>
            <button type="submit" name="orden" value="nombre" >Hotel</button>
            <button type="submit" name="orden" value="tarifa_noche" >tarifa</button>
            <button type="submit" name="orden" value="habitaciones_disponibles" >disponibilidad</button>
            <button type="submit" name="orden" value="ranking" >Ranking</button>
            <p id="parrafo"></p>

        </div>
    </form>
    <?php
    include "conexion.php";
    session_start();

    if (isset($_POST['orden'])) {
        $orden = $conexion->real_escape_string($_POST["orden"]);
        if ($orden == 'ranking') {
            $consulta = "SELECT h.ubicacion, h.nombre, h.habitaciones_disponibles, h.tarifa_noche, COUNT(r.id_hotel)AS ranking 
            FROM reserva r INNER JOIN hotel h  ON r.id_hotel = h.id_hotel
            GROUP BY r.id_hotel, h.nombre 
            ORDER by ranking ASC";
        }
        else {
        $consulta = "SELECT * FROM hotel ORDER BY $orden";
        }
    $resultado = $conexion->query($consulta);
        
    // Verifica si hay resultados (true y > 0)
    if ($resultado->num_rows > 0) {
        // Mostrar los resultados en una tabla HTML
        echo '<table> 
       		<tr> 
		    <th>DESTINO</th>    
            <th>HOTEL</th>
            <th>HABITACIONES<br>DISPONIBLES</th>
            <th>TARIFA<br>NOCHE</th>
            </tr>';
        // Iterar sobre cada fila de resultados
        while ($fila = $resultado->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $fila['ubicacion'] . '</td>';
            echo '<td>' . $fila['nombre'] . '</td>';
            echo '<td>' . $fila['habitaciones_disponibles'] . '</td>';
            echo '<td>' . $fila['tarifa_noche'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        // Si no hay resultados, mostrar un mensaje
        echo '<p>No se encontraron hoteles disponibles :-( .</p>';
    }
    }
    ?>
    <form id="form_dest" name="form_dest" method="post" action="formulario_reserva.php" autocomplete="off">
        <div><br><br><br>
            <label id="etiqueta" for="destino">SELECCIONA TU DESTINO</label><br>

            <button type="submit" name="destino" value="Argentina" class="boton_destino">Argentina</button>
            <button type="submit" name="destino" value="Bolivia" class="boton_destino">Bolivia</button>
            <button type="submit" name="destino" value="Colombia" class="boton_destino">Colombia</button>
            <button type="submit" name="destino" value="Brasil" class="boton_destino">Brasil</button>
            <p id="parrafo"></p>

        </div>
    </form>

    <script src="JS_Agencia_Viajes.js"></script>
</body>

</html>