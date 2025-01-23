<main class="contenedor seccion contenido-centrado">
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <h1>Iniciar sesion</h1>
    <form class="formulario" method="POST" action="/login" novalidate>
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Tu email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Tu password" required>
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>

</main>