<main class="contenedor seccion">
    <?php if($mensaje):?>
        <p class="alerta exito"><?= s($mensaje) ?></p>
    <?php endif;?>
    <a href="/propiedades/crear" class="boton boton-verde">Nueva propiedad</a>
    <a href="/vendedores/crear" class="boton boton-amarillo">Nuevo vendedor</a>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($propiedades as $propiedad): ?>
                <tr>
                    <td><?= $propiedad->id ?></td>
                    <td><?= $propiedad->titulo ?></td>
                    <td><img src="<?= $propiedad->imagen ? '/imagenes/' . $propiedad->imagen : '/stock/propiedad.jpg' ?>" class="imagen-tabla" alt="imagen casa"></td>
                    <td><?= $propiedad->precio ?></td>
                    <td class="space-y-2">
                        <form method="POST" class="w-100" action="/propiedades/eliminar">
                            <input type="hidden" name="id" value="<?= $propiedad->id ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar" />
                        </form>
                        <a href="/propiedades/actualizar?id=<?= $propiedad->id ?>" class="boton-amarillo-block w-100">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Vendedores</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendedores as $vendedor): ?>
                <tr>
                    <td><?= $vendedor->id ?></td>
                    <td><?= $vendedor->nombre . " " . $vendedor->apellido ?></td>
                    <td><?= $vendedor->telefono ?></td>
                    <td class="space-y-2">
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?= $vendedor->id ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar" />
                        </form>
                        <a href="/admin/vendedores/actualizar.php?id=<?= $vendedor->id ?>" class="boton-amarillo-block w-100">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>