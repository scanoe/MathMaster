<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container mt-40 center">
    <h2 class="fs2">Curso completado +10EXP</h2>
    <p class="mt-20 fs1-5 grey-text">Sigue aprendiendo y conviértete en el mejor</p>
    <?php if($insignias != null){ ?>
        <div class="container mt-20">
            <section>
                <h3 class="fs1-5">Insignias ganadas</h3>
                <div class="row mt-20">
                    <?php  foreach($insignias as $insignia): ?>
                        <div class="col l4">
                            <article class="card p-card">
                                <figure class="mb-20"><img class="responsive-img center" src="<?= base_url('img/medallas/'.$insignia->imagen) ?>" height="80"></figure>
                                <p><?= $insignia->nombre ?></p>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    <?php } ?>
    <a class="waves waves-light btn blue br10" href="<?= base_url() ?>/index.php/Curso/cargar_lista_cursos">Ir al inicio</a>
</div>