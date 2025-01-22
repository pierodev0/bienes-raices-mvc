<fieldset>
    <legend>Información Vendedor</legend>

    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre Vendedor" value="<?= s($vendedor->nombre) ?>">

    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido Vendedor" value="<?= s($vendedor->apellido) ?>">

    <label for="telefono">Telefono</label>
    <input type="tel" id="telefono" name="vendedor[telefono]" placeholder="Telefono Vendedor" value="<?= s($vendedor->telefono) ?>">
</fieldset>