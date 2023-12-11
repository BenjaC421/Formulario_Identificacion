<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de datos</title>
</head>
<body>
    <?php
    $documento = "n_documento";
    require_once("conexion.php");
    $sql = "SELECT nombre,apellidos_p,apellidos_m,fecha_nacimiento,rut,n_identificador,n_documento,fotografia,sexo,nacionalidad,donante_organos,discapacitado,lugar_nacimiento,profesion FROM personas";
    $resultado = $conexion->query($sql);

    // Verificar si hay resultados
    if ($resultado->num_rows > 0) {
    // Mostrar la tabla
        echo "<table border='1'>";
        echo "<tr><th>nombre</th><th>apellidos_p</th><th>apellidos_m</th><th>fecha_nacimiento</th><th>rut</th><th>n_identificador</th><th>n_documento</th><th>fotografia</th><th>sexo</th><th>nacionalidad</th><th>donante</th><th>discapacitado</th><th>lugar_nacimiento</th><th>profesion</th>";

    // Mostrar los datos
        while($fila = $resultado->fetch_assoc()) {
            echo "<form action='carnet.php' method='post'>"."<tr><td>".$fila["nombre"]."</td><td>".$fila["apellidos_p"]."</td><td>".$fila["apellidos_m"]."</td><td>".$fila["fecha_nacimiento"]."</td><td>".$fila["rut"]."</td><td>".$fila["n_identificador"]."</td><td>"."<input type='hidden' name='n_documento' id='n_documento' value = '$fila[$documento]'>".$fila[$documento]."</td><td>".$fila["fotografia"]."</td><td>".$fila["sexo"]."</td><td>".$fila["nacionalidad"]."</td><td>".$fila["donante_organos"]."</td><td>".$fila["discapacitado"]."</td><td>".$fila["lugar_nacimiento"]."</td><td>".$fila["profesion"]."</td><td>"."<input type='submit' value='Crear documento' class='btn btn-primary' name='action'></form>"."</tr></td>";

        }

        echo "</table>";
}   
    else {
        echo "No se encontraron resultados.";
}

    ?>
</body>
</html>
