<div class="container mt-40">
    <h1 class="fs2">Cursos</h1>
    <section class="contenedor-cursos mt-40">
        <div class="row">
            <!-- Será un for que trae todos los cursos de la BD -->
            <?php foreach($cursos as $curso): ?>
                <div class="col l4 center-align mb-40">
                    <h2 class="fs1-5 mb-20"><?= $curso->nombre ?></h2>
                    <p class="mb-20"><?= $curso->descripcion ?></p>
                    <form action="">
                        <input class="white-text submit waves-effect waves-light boton-realizar" type="submit" value="Realizar">
                    </form>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>