<main class="contenedor seccion contenido-centrado">
    <h1 data-cy="heading-login">Iniciar Sesión</h1>

    <?php foreach ($errores as $error) : ?>
        <div data-cy="alerta-login" class="alerta error"><?php echo $error ?></div>
    <?php endforeach; ?>
    <form data-cy="formulario-login" class="formulario" method="POST" novalidate>
        <fieldset>
            <legend>Email & Password</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="tu E-mail" id="email">

            <label for="password">E-mail</label>
            <input type="password" name="password" placeholder="tu password" id="password">
        </fieldset>

        <input type="submit" value="Iniciar sesion " class="boton boton-verde">
    </form>
</main>