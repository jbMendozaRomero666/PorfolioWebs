<div class="contenedor crear">
<?php include_once __DIR__ . '/../templates/nombre.sitio.php';
?>
    <div class="contenedor-sm">
        <p class="descripcion-pagina">crea tu cuenta en UpTask</p>
        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

        <form class="formulario" action="/crear" method="POST">
        <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre"
                value="<?php echo $usuario->nombre; ?>"/>
            </div>
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Ingresa tu email" 
                value="<?php echo $usuario->email; ?>"/>
            </div>
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="ingresa tu password" />
            </div>
            <div class="campo">
                <label for="password2">Repite Password</label>
                <input type="password" name="password2" id="password2" placeholder="Repite tu password" />
            </div>
            <input type="submit" class="boton" value="Crear Cuenta">
        </form>

        <div class="acciones">
            <a href="/">¿Ya tienes una cuenta? iniciar Sesión</a>
            <a href="/olvide">¡olvidate tu password?</a>
        </div>
    </div>
</div>