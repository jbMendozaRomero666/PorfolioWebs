<?php

use Model\Usuario;

include_once __DIR__ . '/header-dashboard.php'; ?>
<div class="contenedor-sm">

    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
    <a href="/perfil" class="enlace">Volver a perfil</a>

    <form class="formulario" method="POST" action="/cambiar-password">

        <div class="campo">
            <label for="password">password: </label>
            <input type="password" 
             name="password_actual" placeholder="Tu password Actual" />
        </div>

        <div class="campo">
            <label for="password">Password: </label>
            <input type="password" 
             name="password_nuevo" placeholder="Tu Nuevo password" />
        </div>

        <!-- <div class="campo">
    <label for="contraseña">Contraseña: </label>
    <input type="contraseña"
           value=""
           name="contraseña"
           placeholder="Tu contraseña"/>
</div> -->

        <input type="submit" value="Guardar Cambios" />

    </form>

</div>
<?php include_once __DIR__ . '/footer-dashboard.php'; ?>