<div class="container mt-40 relative">
    <div class="flex boton-flotante">
        <a href="<?= base_url() ?>index.php/Curso/cargar_formulario_crear_curso" class="btn-floating btn-large waves-effect waves-light blue relative"><img src="<?= base_url("img/ic_add_white_24px.svg") ?>"></a>       
    </div>
    <div class="mt-40">
        <h1 class="fs2">Cursos</h1>
        <section class="mt-40">
            <div class="row">
                <?php foreach($cursos as $curso): ?>
                    <div class="col s12">
                        <article class="mt-10">
                            <div class="row">
                                <div class="col l12">
                                    <div>
                                        <h2 class="fs1-5 mb-20"><?= $curso->nombre ?></h2>
                                        <p class="mb-20"><?= $curso->descripcion ?></p>                            
                                    </div>
                                </div>
                                <div class="col l8">
                                    <div>
                                        <ul class="flex">
                                            <a class="white-text waves-effect waves-light blue w100 opciones-curso" href="<?= base_url() ?>index.php/pregunta/agregar_pregunta/<?= $curso->id ?>"><li class="center-align">Agregar Pregunta</li></a>
                                            <a class="white-text waves-effect waves-light blue w100 opciones-curso" href=""><li class="center-align">Agregar insignia</li></a>                                           
                                            <a class="white-text waves-effect waves-light blue w100 opciones-curso" href="<?= base_url() ?>index.php/Curso/actualizar_explicacion/<?= $curso->id ?>"><li class="center-align">Actualizar explicación</li></a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="divider"></div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</div>