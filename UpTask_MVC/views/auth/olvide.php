<div class="contenedor olvide">
    <?php include_once __DIR__ . '/../templates/nombre.sitio.php' ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Recupera tu Acceso UpTask</p>
        <?php require_once __DIR__ .'/../templates/alertas.php'; ?>
        <form class="formulario" action="/olvide" method="POST" novalidate>
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Ingresa tu email" />
            </div>
            <input type="submit" class="boton" value="Enviar Instrucciones">
        </form>

        <div class="acciones">
            <a href="/">¿Ya tienes una cuenta? iniciar Sesión</a>
            <a href="/crear">¿Aun no tienes una cuenta? obtener una</a>
        </div>
    </div>
</div>