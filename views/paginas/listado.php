
<div class="contenedor-anuncios">

    <?php foreach ($propiedades as $propiedad): ?>
        <div class="anuncio">
            <picture>
                <img loading="lazy" 
                src="<?= $propiedad->imagen ? '/imagenes/' . $propiedad->imagen : '/stock/propiedad.jpg' ?>" 
                alt="anuncio">
            </picture>

            <div class="contenido-anuncio">
                <h3><?= $propiedad->titulo ?></h3>
                <p><?= truncate($propiedad->descripcion, 50) ?></p>
                <p class="precio"><?= $propiedad->precio ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?= $propiedad->wc ?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?= $propiedad->estacionamiento ?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p><?= $propiedad->habitaciones ?></p>
                    </li>
                </ul>

                <a href="anuncio?id=<?= $propiedad->id ?>" class="boton-amarillo-block">
                    Ver Propiedad
                </a>
            </div><!--.contenido-anuncio-->
        </div><!--anuncio-->
    <?php endforeach; ?>

</div> <!--.contenedor-anuncios-->