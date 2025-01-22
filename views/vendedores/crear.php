
<main class="contenedor seccion">
    <h1>Registrar vendedor@</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error): ?>
        <div class="alerta error"><?= $error ?></div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/vendedores/crear">
       
        <?php include __DIR__ . "/formulario.php"; ?>
        <input type="submit" class="boton boton-verde" value="Registrar Vendedor">
    </form>
</main>