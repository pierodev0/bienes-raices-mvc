<main class="contenedor seccion">
    <?php foreach ($errores as $error): ?>
        <div class="alerta error"><?= $error ?></div>
    <?php endforeach; ?>
    <form class="contenedor formulario" method="post" enctype="multipart/form-data" novalidate>
        <h1>Actualizar</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php include __DIR__ . "/formulario.php"; ?>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>