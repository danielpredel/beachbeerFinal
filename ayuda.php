<?php
    include "head.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilosAyuda.css">
</head>
<body>
    <div class="contenedorPrincipal">
        <h1 class="ayud">Preguntas Frecuentes</h1>
        <br>
        <br>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        ¿Qué métodos de pago aceptan?
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body" id="pregunta1">
                        <ul>
                            <li>Tarjetas de Crédito: VISA, MasterCard, American Express</li>
                            <li>Tarjetas de débito: DISCOVER, PayPal, VISA</li>
                            <li>Pago en efectivo: OXXO, 7ELEVEN, CIRCLE K</li>
                            <li>Pago en banco: Santander, BBVA, citibanamex</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        ¿Cuánto tardara en llegar mi producto?
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body" id="pregunta2">
                        El tiempo que tarda el envío dependerá del prestador de servicios de paquetería y a tu cercanía con nuestras instalaciones, si vives dentro 
                        de la Republica Mexicana el envío puede tomar desde 3 a 5 días.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        ¿Qué productos están disponibles?
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body" id="pregunta3">
                    Todos los productos que se muestran en nuestra tienda y tienen stock están disponibles para su compra.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        ¿Cómo puedo contactarlos?
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body" id="pregunta4">
                        <ul>
                            <li>Email: beachbeer082@gmail.com</li>
                            <li>Tel: 4494189869</li>
                            <li>Dirección: Av. Francisco I. Madero 123, Zona Centro, 20000 Aguascalientes, Ags.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                        ¿Se permite la venta de alcohol a menores de edad?
                    </button>
                </h2>
                <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body" id="pregunta5">
                        No, la venta de alcohol esta prohibida para menores de edad y se requiere una identificación oficial para su compra.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                        ¿Qué impuestos cobran?
                    </button>
                </h2>
                <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body" id="pregunta6">
                        Cobramos de impuestos el IVA del 5% de la suma del costo de los productos más el envío
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3702.3769632783897!2d-102.29735748573928!3d21.88155516349525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8429ee7ca61d5813%3A0xd5c973c65f839335!2sAv.%20Francisco%20I.%20Madero%20123%2C%20Zona%20Centro%2C%2020000%20Aguascalientes%2C%20Ags.!5e0!3m2!1ses-419!2smx!4v1670001749694!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <?php
        include "footer.php";
    ?>
    
</body>
</html>
