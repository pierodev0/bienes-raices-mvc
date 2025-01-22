<fieldset>
      <legend>Información General</legend>
      <label for="titulo">Titulo:</label>
      <input type="text"
        id="titulo"
        name="propiedad[titulo]"
        placeholder="Titulo Propiedad"
        value="<?= s($propiedad->titulo) ?>"
        required>

      <label for="precio">Precio:</label>
      <input
        type="number"
        id="precio"
        name="propiedad[precio]"
        placeholder="Precio Propiedad"
        value="<?= s($propiedad->precio) ?>">

      <label for="imagen">Imagen:</label>
      <input
        type="file"
        id="imagen"
        accept="image/jpeg, image/png"
        name="propiedad[imagen]"
        required>
        <?php if($propiedad->imagen):?>
          <img src="<?= '/imagenes/' . $propiedad->imagen ?>" class="imagen-small">
        <?php else :?>
          <img src="/stock/propiedad.jpg" class="imagen-small">
          <?php endif ?>

      <label for="descripcion">Descripcion:</label>
      <textarea
        id="descripcion"
        name="propiedad[descripcion]"
        required><?= s($propiedad->descripcion) ?></textarea>
    </fieldset>
    <fieldset>
      <legend>Información Propiedad</legend>

      <label for="habitaciones">Habitaciones:</label>
      <input type="number"
        id="habitaciones"
        name="propiedad[habitaciones]"
        placeholder="Ej. 3"
        min="1"
        max="9"
        value="<?= s($propiedad->habitaciones) ?>"
        required>

      <label for="wc">Baños:</label>
      <input
        type="number"
        id="wc"
        name="propiedad[wc]"
        placeholder="Ej. 3"
        min="1"
        max="9"
        value="<?= s($propiedad->wc) ?>"
        required>

      <label for="estacionamiento">Estacionamiento:</label>
      <input
        type="number"
        id="estacionamiento"
        name="propiedad[estacionamiento]"
        placeholder="Ej. 3"
        min="1"
        max="9"
        value="<?= s($propiedad->estacionamiento) ?>"
        required>
    </fieldset>
    <fieldset>
      <legend>Vendedor</legend>
      <select name="propiedad[vendedorId]" id="vendedorId">
        <option value="" selected>Seleccionar</option>
        <?php foreach($vendedores as $vendedor):?>
          <option 
          <?= $propiedad->vendedorId === $vendedor->id ? 'selected' : ''?>   
            value="<?= s($vendedor->id) ?>"><?= s($vendedor->nombre) . " " . s($vendedor->apellido) ?>
          </option>
        <?php endforeach;?>
      </select>
    </fieldset>