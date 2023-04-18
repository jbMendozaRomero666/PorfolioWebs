<h1 class="nombre-pagina">Recuperar Password</h1>

<p class="descripcion-pagina">Coloca tu nuevo password a continuación</p>
<?php require_once __DIR__ . "/../templates/alertas.php" ?>

<?php if($error) return; ?> <!--si hay error oculta todo lo que este debajo de el -->
<form class="formulario" method="POST">
    <div class="campo">
        <label for="Password">Password</label>

        <input type="password" id="password" name="password" placeholder="Tu nuevo Password">
    </div>


    <input type="submit" class="boton" value="Guardar Nuevo Password">
</form>

<div class="acciones">
    <a href="/">¿ya tienes una cuenta? Inici Sesión</a>
    <a href="/crear-cuenta">¿aun no tienes una cuenta? Crear una</a>
</div>