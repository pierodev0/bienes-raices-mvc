<main class="contenedor seccion">
    <h1>Contacto</h1>
   <?php if($mensaje):?>
       <p class="alerta exito"><?= $mensaje ?></p>
   <?php endif;?>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
    </picture>

    <h2>Llene el formulario de Contacto</h2>

    <form class="formulario" action="/contacto" method="post" novalidate>
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]">





            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="contacto[mensaje]"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vende o Compra:</label>
            <select id="opciones" name="contacto[tipo]">
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[precio]">

        </fieldset>

        <fieldset x-data="{ contacto: '' }">
            <legend>Información sobre la propiedad</legend>

            <p>¿Cómo desea ser contactado?</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input x-model="contacto" name="contacto[contacto]" type="radio" value="telefono" id="contactar-telefono">

                <label for="contactar-email">E-mail</label>
                <input x-model="contacto" name="contacto[contacto]" type="radio" value="email" id="contactar-email">
            </div>

            <template x-if="contacto === 'telefono'">
                <div>
                    <label for="telefono">Teléfono</label>
                    <input type="tel" placeholder="Tu Teléfono" id="telefono" name="contacto[telefono]">

                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name="contacto[fecha]">

                    <label for="hora">Hora:</label>
                    <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
                </div>
            </template>

            <template x-if="contacto === 'email'">
                <div>
                    <label for="email">E-mail</label>
                    <input type="email" placeholder="Tu Email" id="email" name="contacto[email]">
                </div>
            </template>
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>