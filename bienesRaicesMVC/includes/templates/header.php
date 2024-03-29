<?php
if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;

 //var_dump($auth);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anuncios</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>

    <header class="header
     <?php if ($inicio) {
            echo 'inicio';
        } else {
            echo '';
        } ?>">
        <!-- echo isset($inicio) ? 'inicio' : ''; operador ternario isset borra error bariable no definida-->
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                    <img src="/build/img/logo.svg" alt="Logo tipo de vienes raices">
                </a>
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>
                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="Icono de dark mode">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                    <?php if($auth):?>
                        <a href="cerrar-session.php">Cerrar Sesión</a>
                    <?php endif;?>
                    </nav>
                </div>
            </div>
            <!--.barra-->
            <?php
            if ($inicio) {
                echo "<h1>venta de casas y departamentos exclusivos  de lujo </h1>";
            }
            ?>
            <!--echo $inicio ? '<h1>venta de casas y departamentos exclusivos  de lujo </h1>' : ''; -->
        </div>
    </header>