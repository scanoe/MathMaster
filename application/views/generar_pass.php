<div class="container mt-40">
    <?= form_open('Pass/generar') ?>
        <div class="">
            <label for = "password">Contraseña</label>
            <input type="text" id="password" name="password">
        </div>
        <div class="center-align mb-40">
            <?php if(isset($pass)){ ?>
                <h2 class="fs1-3">Su contraseña encriptada: </h2>
            <?php } ?>
            <p class="hash fs2"><?= $pass ?></p>
        </div>
        <div class="center-align">
            <input class="white-text submit waves-effect waves-light" type="submit" value="Generar contraseña encriptada"></a>
        </div>
    <?= form_close() ?>
</div>