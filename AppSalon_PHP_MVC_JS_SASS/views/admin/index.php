<h1 class="nombre-pagina">Panel de Administracion</h1>

<h2>Buscar citas</h2>

<?php
include_once __DIR__ . '/../templates/barra.php';
?>

<div class="formulario">
   <div class="busqueda">
      <form class="formulario">
         <div class="campo">
            <label for="fecha">fecha</label>
            <input type="date" id="fecha" name="fecha" value="<?php echo $fecha; ?>" />
         </div>
      </form>
   </div>
</div>
<?php
if (count($citas) === 0) {
   echo "<h2> No hay citas en esra fecha</h2>";
}
?>
<div class="citas-admin">
   <ul class="citas">
      <?php
      $idCita = 0;
      foreach ($citas as $key => $cita) {
         if ($idCita !== $cita->id) {
            $total = 0;
      ?>

            <li>
               <p>ID: <span><?php echo $cita->id; ?></span></p>
               <p>Hora: <span><?php echo $cita->hora; ?></span></p>
               <p>Cliente: <span><?php echo $cita->cliente; ?></span></p>
               <p>Email: <span><?php echo $cita->email; ?></span></p>
               <p>Email: <span><?php echo $cita->telefono; ?></span></p>

               <h3>Servicios</h3>
            <?php
            $idCita = $cita->id;
         } // Fin de if
         $total += $cita->precio ?>
            <p class="servicio"><?php echo $cita->servicio . " " . $cita->precio; ?></p>

            <?php
            $actual = $cita->id;
            $proximo = $citas[$key + 1]->id ?? 0;

            if (esUltimo($actual, $proximo)) { ?>
               <p class="total">Total: <span>$<?php echo $total; ?></span></p>

               <form action="/api/eliminar" method="POST">
                  <input type="hidden" name="id" value="<?php echo $cita->id; ?>">
                  <input type="submit" class="boton-eliminar" value="eliminar">
               </form>
         <?php
            }
         } // fin del foreach 
         ?>

   </ul>
</div>

<?php
$script = "<script src='build/js/buscador.js'></script>"
?>