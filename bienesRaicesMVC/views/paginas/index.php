<main class="contenedor seccion">
    <h2 data-cy="heading-nosotros">Más sobre nosotros</h2>

   <?php include 'iconos.php' ?>
</main>

<section class="seccion contenedor">
    <h2>Casas y Depas en Venta</h2>


    <?php
    $limit = 3;
    include 'listado.php'; ?>
    <!--.contenidor-anuncios-->
    <div class="alinear-derecha" >
        <a data-cy="ver-propiedades" href="/propiedades" class="boton-verde">Ver Todas</a>
    </div>
</section>

<section data-cy="imagen-contacto" class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut, magni.</p>
    <a href="/contacto" class="boton-amarillo">Contactenos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section data-cy="blog" class="blog">

        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="../build/img/blog1.webp" type="imagen/avif">
                    <source srcset="../build/img/blog1.jpg" type="imagen/webp">
                    <img loading="lazy" width="300" height="200" src="../build/img/blog1.jpg" alt="Texto de entrada">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el: <span>20/10/2021</span>por: <span>Admin</span></p>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo optio nam iure veniam tempore,
                        asperiores officiis non. Alias, enim laudantium.</p>
                </a>

            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="imagen/avif">
                    <source srcset="build/img/blog2.jpg" type="imagen/webp">
                    <img loading="lazy" width="300" height="200" src="../build/img/blog2.jpg" alt="Texto de entrada">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Guia para la decoracion de tu hogar</h4>
                    <p class="informacion-meta">Escrito el: <span>20/10/2021</span>por: <span>Admin</span></p>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo optio nam iure veniam tempore,
                        asperiores officiis non. Alias, enim laudantium.</p>
                </a>

            </div>
        </article>
    </section>

    <section data-cy="testimoniales" class="testimoniales">
        <h3>testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis reprehenderit non, ea at illum vitae, libero a commodi debitis tenetur praesentium temporibus ullam numquam minus sint repellendus molestiae recusandae quisquam.
            </blockquote>
            <p>- jesus mendoza</p>
        </div>

    </section>
</div>

