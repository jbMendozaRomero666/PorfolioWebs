<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Inicia Sesión con tus credenciales</p>

<?php require_once __DIR__ . "/../templates/alertas.php" ?>
<form class="formulario" method="POST" action="/">

<div class="campo">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Tu email">
</div>
<div class="campo">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="ingresa tu contraseña">
</div>
<input type="submit" class="boton" value="Iniciar Sesión">
</form>

<div class="acciones">
    <a href="/crear-cuenta">¿aun no tiene una cuenta? crear una</a>
    <a href="/olvide">¿olvidaste tu password?</a>
</div>