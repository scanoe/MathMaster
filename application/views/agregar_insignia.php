<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container mt-40">
    <header class="mb-40 mt-40">
        <h1 class="fs2">Agregar insignia </h1>
    </header>
    <?= form_open('Insignia/insertar/'.$id) ?>
        <div class="input-field">
            <label for="nombre">Nombre de la insignia</label>
            <input type="text" id="nombre" name="nombre" value = "<?= $back['nombre'] ?>" data-length="100">
        </div>
        <label class="error"><?= isset($errores['nombre']) ? $errores['nombre'] : "" ?></label>
        <div class="input-field">
            <label for="descripcion">Descripción de la insignia</label>
            <input type="text" id="descripcion" name="descripcion" value = "<?= $back['descripcion'] ?>" data-length="1000">
        </div>
        <label class="error"><?= isset($errores['descripcion']) ? $errores['descripcion'] : "" ?></label>
        <p class="pr-32 grey-text">Escoge una imagen</p>
        <div class="row">
            <div class="col l2 pr-32">
                <input class="with-gap" name="imagen" type="radio" id="medal1" value="medal1.jpg"  checked/>               
                <label for="medal1"><img class="no-block" src="<?= base_url('img/medallas/medal1.jpg') ?>" height="80"></label>
            </div>
            <?php for($i = 2; $i <= 15; $i++){ ?>
                <div class="col l2 pr-32">
                    <input class="with-gap" name="imagen" type="radio" id="medal<?= $i ?>" value="medal<?= $i?>.jpg"/>               
                    <label for="medal<?= $i ?>"><img class="no-block" src="<?= base_url('img/medallas/medal'.$i.'.jpg') ?>" height="80"></label>
                </div>
            <?php } ?>
        </div>
        <label class="error"><?= isset($errores['imagen']) ? $errores['imagen'] : "" ?></label>
        <div class="center-align pt-24">
            <input class="white-text submit waves-effect waves-light" type="submit" value="Agregar insignia al curso"></a>
        </div>
    <?= form_close() ?>
</div>