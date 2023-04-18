<h1 class="nombre-pagina">Olvide password</h1>
<p class="descripcion-pagina">Reestablece tu password escribiendo tu email a continuacion</p>

<?php require_once __DIR__ . "/../templates/alertas.php" ?>
<form class="formulario" method="POST" action="/olvide">

<div class="campo">
<label for="email">Email</label>
<input type="email" id="email" name="email" placeholder="ingresa tu email">
</div>
<input type="submit" value="Recuperar password" class="boton">
</form>

<div class="acciones">
    <a href="/">¿ya tienes una cuenta? Inici Sesión</a>
    <a href="/crear-cuenta">¿aun no tienes una cuenta? Crear una</a>
</div>