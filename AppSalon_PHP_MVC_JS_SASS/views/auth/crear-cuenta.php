<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>
<?php include_once __DIR__ . "/../templates/alertas.php" ?>
<form class="formulario" method="POST" action="/crear-cuenta">

<div class="campo">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" placeholder="ingresa tu nombre" value="<?php echo s($usuario->nombre); ?>">
</div>
<div class="campo">
    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="apellido" placeholder="ingresa tu apellido" value="<?php echo s($usuario->apellido); ?>">
</div>

<div class="campo">
<label for="telefono">Telefono</label>  
<input type="tel" id="telefono" name="telefono" placeholder="infresa tu numero telefonico" value="<?php echo s($usuario->telefono); ?>">  
</div>
<div class="campo">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="ingresa tu Email" value="<?php echo s($usuario->email); ?>">
</div>

<div class="campo">
    <label for="password">Password</label>
    <input type="password" name="password" id="passwords" placeholder="ingresa tu password">

</div>
<input type="submit" value="Crear Cuenta" class="boton">
</form>

<div class="acciones">
    <a href="/">¿ya tienes una cuenta? Inici Sesión</a>
    <a href="/olvide">¿olvidaste tu password?</a>
</div>  