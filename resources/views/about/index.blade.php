@include('includes.sidebar')
@include('includes.bostrapcrud')




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iveth's Beauty Salon Spa & Nails</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #33034acc;
            width: 100%;
            padding: 20px;
            color:fff;
            text-align: center;
        }
        .container {
            max-width: 100%;
            margin: 20px auto;
            padding: 0 20px;
        }
        .about-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
        }
        .column {
            flex: 1;
            margin-right: 20px;
        }
        .column:last-child {
            margin-right: 0;
        }
        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        h1{
            color:#fff;
        }
        p {
            color: #666;
            line-height: 1.6;
        }
        footer {
            background-color: #33034acc;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <h1>Iveth's Beauty Salon Spa & Nails</h1>
    </header>


    <main>
    <div class="container">
        <div class="about-section">
            <div class="column">
                <h2>Sobre Nosotros</h2>
                <p>En Iveth's Beauty Salon Spa & Nails encontraras un refugio de tranquilidad y relajación. Aquí, puedes escapar del estrés diario y disfrutar de un ambiente sereno mientras nuestros terapeutas altamente capacitados te brindan masajes terapéuticos y tratamientos corporales revitalizantes. </p>
            </div>
            <div class="column">
                <h2>Servicios</h2>
                <p>Nuestro objetivo es superar tus expectativas y asegurarnos de que te sientas mimado y satisfecho en cada visita.</p>
            </div>
            <div class="column">
                <h2>Productos</h2>
                <p>Desde productos para el cuidado del cabello hasta cosméticos para el cuidado de la piel, seleccionamos cuidadosamente cada artículo para garantizar que tu experiencia sea completamente satisfactoria y que puedas mantener y realzar tu belleza incluso después de salir de nuestro salón.</p>
            </div>
        </div>
        <div class="about-section">
            <div class="column">
                <h2>Spa</h2>
                <p>Nuestro spa es un santuario de tranquilidad y relajación donde puedes escapar del estrés diario...</p>
            </div>
            <div class="column">
                <h2>Contacto</h2>
                <p><strong>Dirección:</strong> Tercera Avenida Sur Casa #4 entre Calle Ramón Flores y Primera Calle Oriente, Chalchuapa, Santa Ana.<br>
                   <strong>Teléfono:</strong> 7870-9429<br>
                   <strong>Redes Sociales:</strong> <a href="#">WhatsApp</a> | <a href="#">Facebook</a> | <a href="#">Instagram</a></p>
            </div>
        </div>
    </div>
    <footer>
        Iveth´s Beauty Salón Spa & Nails - © 2023 Derechos Reservados
    </footer>
</body>
</html>

</main>