<?php
require_once("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-5" style="margin-left: -200px">
                <form action="procesar.php" method="post" enctype="multipart/form-data">

                    <label for="nombre" class="form-label">Nombre</label><br>
                    <input type="text" name="nombre" id="nombre" class="form-control"><br>
        
                    <label for="apellido_p" class="form-label">Apellido paterno</label><br>
                    <input type="text" name="apellido_p" id="apellido_P" class="form-control"><br>

                    <label for="apellido_m" class="form-label">Apellido materno</label><br>
                    <input type="text" name="apellido_m" id="apellido_m" class="form-control"><br>
                   
                    <label for="rut" class="form-label">Rut</label><br>
                    <input type="text" name="rut" id="rut" class="form-control"><br>
            
                    <label for="nacionalidad" class="form-label">Nacionalidad</label><br>
                    <select name="nacionalidad" id="nacionalidad" class="form-select">
                        <option value="Chilena">Chilena</option>
                        <option value="Extranjera">Extranjera</option>
                    </select><br>
                    
                    <label for="lugar_de_nacimiento" class="form-label">Lugar de nacimiento</label><br>
                    <input type="text" name="lugar_de_nacimiento" id="lugar_de_nacimiento" class="form-control"><br>

                    <label for="profesion" class="form-label">Profesion</label><br>
                    <input type="text" name="profesion" id="profesion" class="form-control"><br>

                    <label for="foto" class="form-label">Fotografia</label><br>
                    <input type="file" name=foto id=foto class="form-control"><br>
                    
                    <label for="fecha" class="form-label">Fecha de nacimiento</label><br>
                    <input type="date" name=fecha id=fecha class="form-control"><br>
                    
                    <label for="sexo" class="form-label">sexo</label><br>
                    
                        <input type="radio" id="Masculino" name="sexo" value="m">
                        <label for="Masculino">Masculino</label>
                        <input type="radio" id="Femenino" name="sexo" value="f">
                        <label for="Femenino">Femenino</label>
                        <input type="radio" id="Otro" name="sexo" value="o">
                        <label for="Otro">Otro</label><br>

                    <label for="discapacidad" class="form-label">¿Tiene alguna discapacidad?</label><br>
                        <input type="radio" id="si" name="discapacidad" value="si">
                        <label for="si">Si</label>
                        <input type="radio" id="no" name="discapacidad" value="no">
                        <label for="no">No</label><br>

                    <label for="donante" class="form-label">¿Es donante de organos?</label><br>
                        <input type="radio" id="si" name="donante" value="si">
                        <label for="si">Si</label>
                        <input type="radio" id="no" name="donante" value="no">
                        <label for="no">No</label><br>

                    <input type="submit" value="Enviar" class="btn btn-primary" name="action" >
                
            </div> 
            <div class="col-1" style="margin-top: 258px">       
                     <label for="identificador" class="form-label">Numero identificador</label><br>
                    <input type="text" name="identificador" id="identificador" class="form-control"><br>
            </div>
            </form>
        </div>
        </div>   

    
</body>
</html>