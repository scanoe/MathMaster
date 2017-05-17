<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row container mt-40 p-card">
    <div class="col l8">
        <div class="p0-5p">
            <header class="center-align">
                <figure><img class="responsive-img center" src="<?= base_url('img/usuario.jpg') ?>" height="100"></figure>               
                <article class="mt-20">
                    <h2 class="fs1-5 grey-text"><?= $nombre?></h2>
                    <h1 class="fs2"><?= $nombre_completo ?></h1>
                    <a href="<?=base_url()?>index.php/Estudiante/cargar_vista_editar_perfil">Editar</a>
                </article>
            </header>
            <h3 class="center-align fs1-5 grey-text mt-40">Cursos Aprobados</h3>
            <div class="row">
                <section class="p-card s12">
                    <div class="row">
                        <?php foreach($cursos_aprobados as $curso_aprobado): ?>
                            <div class="col l4">
                                <article class="card p-card center-align ">
                                    <h4 class="fs1-3"><?= $curso_aprobado->nombre ?></h4>
                                    <p class="mt-10"><?= $curso_aprobado->descripcion ?></p>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="col l4">
        <aside class="p-card">
            <h3 class="fs1-5 grey-text mt-40">Insignias adquiridas</h3>
            <div class="row">
                <section class="col s12">
                    <div class="row">
                        <?php foreach($insignias_ganadas as $insignia_ganada): ?>
                            <div class="col l6">
                                <article class="card p-card">
                                    <figure class="mb-20"><img class="responsive-img center" src="<?= base_url('img/medallas/'.$insignia_ganada->imagen) ?>" height="80"></figure>
                                    <p class="center-align"><?= $insignia_ganada->nombre ?></p>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
        </aside>
    </div>
</div>