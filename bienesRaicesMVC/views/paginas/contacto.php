<main class="contenedor seccion">
    <h1 data-cy="heading-contacto">Contacto</h1>

    <?php if ($mensaje) { ?>
        <p data-cy="alerta-envio-formulario" class="alerta exito"><?php echo $mensaje; ?></p>
    <?php } ?>
    <picture>
        <source srcset="build/img/destacada3.webp" type="imagen/webp">
        <source srcset="build/img/destacada3.jpg" type="imagen/jepg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
    </picture>
    <h2 data-cy="heading-formulario">Llene el formulario de contacto</h2>

    <form data-cy="formulario-contacto" class="formulario" action="/contacto" method="POST">
        <fieldset>
            <!--conjunto relacionado de las mismas clases-->
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input data-cy="input-nombre" type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required>

            <label for="mensaje">Nombre</label>
            <textarea data-cy="input-mensaje" id="mensaje" name="contacto[mensaje]" require></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion sobre la propiedad</legend>

            <label for="opciones">Vende o Compra</label>
            <select data-cy="input-opciones" id="opciones " name="contacto[tipo]" required>
                <option value="" disabled selected>--Selecciona--</option>
                <option value="compra">Compra</option>
                <option value="vende">Vende</option>
            </select>
            <label for="presupuesto">precio o presupuesto</label>
            <input data-cy="input-precio" type="number" placeholder="tu precio o presupuesta es" id="presupuesto" name="contacto[precio]" required>

        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input data-cy="forma-contacto" type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>

                <label for="contactar-email">E-mail</label>
                <input data-cy="forma-contacto" type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
            </div>

            <div id="contacto"></div>
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>