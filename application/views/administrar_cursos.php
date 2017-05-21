<div class="container mt-40">
    <h1 class="fs2">Cursos</h1>
    <section class="contenedor-cursos mt-40">
        <div class="row">
            <?php foreach($cursos as $curso): ?>
                <div class="col l4">
                    <article class="card center-align margin-card p-card">
                        <h2 class="fs1-5 mb-20"><?= $curso->nombre ?></h2>
                        <p class="mb-20"><?= $curso->descripcion ?></p>
                        <h5>Dificultad</h5>
                        <div class="flex-center mt-10 mb-20">
                            <?php for($i = 1; $i <= $curso->dificultad; $i++){ ?>
                                <figure class="left">
                                    <img src="<?= base_url("img/ic_star_black_24dp_1x.png") ?>" alt="star">
                                </figure>
                            <?php }
                                for($i = $curso->dificultad; $i < 5; $i++){ ?>
                                    <figure class="left">
                                        <img src="<?= base_url("img/ic_star_border_black_24dp_1x.png") ?>" alt="star">
                                    </figure>
                            <?php } ?>
                            <div class="clear"></div>
                        </div>
                        <a href="<?= base_url() ?>index.php/Curso/actualizar_explicacion/<?= $curso->id ?>" class="white-text submit waves-effect waves-light boton-realizar">Actualizar explicación</a>
                    </article>
                </div>
            <?php endforeach ?>
        </div>
    </section>
</div>