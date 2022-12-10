<?php
    include "head.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilosContactanos.css">
    <title>Contacto</title>
</head>
<body>
    <div id="justificado">
        <h2 class="titulo">Contacto</h2>
        <h4 class="mensaj">Si tienes alguna duda o comentario mandalo,  estaremos enviandote un correo para ayudarte!</h4>
            <div class="contenedor">
                    <div class="form">   
                        <label for="Nombre1" class="form-label">Nombre:</label>
                        <input type="text" id="nom" name="nombre" class="form-input">

                        <label for="Apellido" class="form-label">Apellido:</label>
                        <input type="text" id="nom2" name="apellido" class="form-input">

                        <label for="Correo" class="form-label">Correo:</label>
                        <input type="email" id="correo" name="correo" class="form-input">

                        <label for="Asunto" class="form-label">Asunto:</label>
                        <input type="text" id="asunto" name="asunto" class="form-input">

                        <label for="Detalle" class="form-label">Detalla el problema, sugerencia, comentario, etc.</label>
                        <textarea name="det" id="detalle" class="form-textarea"></textarea>

                        <input class="btn-submit" onclick="enviarCorreoContacto();" value="Enviar">
                    </div>
                    
                    
                </form>
            </div>
    </div>
    
   <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3702.3769632783897!2d-102.29735748573928!3d21.88155516349525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8429ee7ca61d5813%3A0xd5c973c65f839335!2sAv.%20Francisco%20I.%20Madero%20123%2C%20Zona%20Centro%2C%2020000%20Aguascalientes%2C%20Ags.!5e0!3m2!1ses-419!2smx!4v1670001749694!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
</body>
<?php
    include "footer.php";
    ?> 
</html>