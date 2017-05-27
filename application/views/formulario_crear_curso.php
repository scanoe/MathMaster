<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container mt-40">
    <?= form_open('Curso/crear') ?>
        <div class="input-field">
            <label for="nombre">Nombre del curso</label>
            <input type="text" id="nombre" name="nombre" value="<?= $back['nombre'] ?>">
        </div>
        <label class="error"><?= $errores['nombre'] ?></label>
        <div class="input-field">
            <label for="descripcion">Descripción</label>
            <input type="text" id="descripcion" name="descripcion" value="<?= $back['descripcion'] ?>">
        </div>
        <label class="error"><?= $errores['descripcion'] ?></label>
        <div class="input-field">
            <textarea id="explicacion" name="explicacion" class="materialize-textarea" value="<?= $back['explicacion'] ?>"></textarea>
            <label for="explicacion">Explicación</label>
        </div>
        <label class="error"><?= $errores['explicacion'] ?></label>
        <div class="flex">
            <p class="pr-32 grey-text">Dificultad</p>
            <div class="pr-32">
                <input class="with-gap" name="dificultad" type="radio" id="1" value="1"  checked/>
                <label for="1">1</label>
            </div>
            <div class="pr-32">
                <input class="with-gap" name="dificultad" type="radio" id="2" value="2"  />
                <label for="2">2</label>
            </div>
            <div class="pr-32">
                <input class="with-gap" name="dificultad" type="radio" id="3" value="3"  />
                <label for="3">3</label>
            </div>
            <div class="pr-32">
                <input class="with-gap" name="dificultad" type="radio" id="4" value="4"  />
                <label for="4">4</label>
            </div>
            <div class="pr-32">
                <input class="with-gap" name="dificultad" type="radio" id="5" value="5"  />
                <label for="5">5</label>
            </div>
        </div>
        <div class="center-align pt-24">
            <input class="white-text submit waves-effect waves-light" type="submit" value="Crear Curso"></a>
        </div>
    <?= form_close() ?>
</div>