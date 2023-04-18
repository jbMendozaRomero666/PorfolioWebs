<div class="contenedor login">
    <?php include_once __DIR__ . '/../templates/nombre.sitio.php' ?>
    <div class="contenedor-sm">
        <p class="descripcion-pagina">Iniciar Sesión</p>
        <?php include_once __DIR__ . '/../templates/alertas.php' ?>

        <form class="formulario" action="/" method="POST">
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Ingresa tu email" />
            </div>
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="ingresa tu password" />
            </div>
            <input type="submit" class="boton" value="Iniciar Sesión">
        </form>

        <div class="acciones">
            <a href="/crear">¿Aun no tienes una cuenta? obtener una</a>
            <a href="/olvide">¡olvidate tu password?</a>
        </div>
    </div>
</div>