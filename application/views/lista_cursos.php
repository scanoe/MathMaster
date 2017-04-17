<div class="container mt-40">
    <h1 class="fs2">Cursos</h1>
    <section class="contenedor-cursos mt-40">
        <div class="row">
            <?php foreach($cursos as $curso): ?>
                <div class="col l4 center-align mb-40">
                    <h2 class="fs1-5 mb-20"><?= $curso->nombre ?></h2>
                    <p class="mb-20"><?= $curso->descripcion ?></p>
                    <a href="<?= base_url() ?>index.php/Curso/cargar_explicacion/<?= $curso->id ?>" class="white-text submit waves-effect waves-light boton-realizar">Realizar</a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>