<fieldset>
  <legend>Informacion General</legend>
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre Vendedor" value="<?php echo s($vendedor->nombre); ?>">
  <label for="apellido">Apellido:</label>
  <input type="text" id="nombre" name="vendedor[apellido]" placeholder="apellido Vendedor" value="<?php echo s($vendedor->apellido); ?>">
</fieldset>

<fieldset>
  <legend>Informacion Extra</legend>
  <label for="telefono">Telefono:</label>
  <input type="text" id="telefono" name="vendedor[telefono]" placeholder="telefono Vendedor" value="<?php echo s($vendedor->telefono); ?>">
</fieldset>