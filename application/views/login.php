<header>
    <nav>
        <a class="valign-wrapper" href=""><h1 class="valign logo">MathMaster</h1></a>
    </nav>
</header>
<div class="row container mt-40">
    <div class="col l8 offset-l2">
        <h1 class="fs2">Ingreso como profesor</h1>
        <div class="mt-20">
            <?= form_open($funcion) ?>
                <div class="input-field">
                    <label for="Lusername">Nombre de Usuario</label>
                    <input type="text" id="Lusername" name="Lusername">
                </div>
                <div class="input-field">
                    <label for = "Lpassword">Contraseña</label>
                    <input type="password" id="Lpassword" name="Lpassword">
                </div>
                <label class="error"><?= isset($errores['login']) ? $errores['login'] : "" ?></label>
                <div class="center-align">
                    <input class="white-text submit waves-effect waves-light" type="submit" value="Ingresar"></a>
                </div>
                <div>
                <div class="mt-20">
                    <p class="center-align">¿No eres un profesor? Ingresa como <a href="<?= base_url() ?>index.php/Inicio/index">Estudiante</a></p>
                </div>
            <?= form_close() ?>
        </div>
    </div>
</div>