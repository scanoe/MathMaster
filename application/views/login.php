<div class="login z-depth-2" id="login">
    <?= form_open($funcion) ?>
        <div class="input-field">
            <label for="Lusername">Nombre de Usuario</label>
            <input type="text" id="Lusername" name="Lusername">
        </div>
        <div class="input-field">
            <label for = "Lpassword">Contraseña</label>
            <input type="password" id="Lpassword" name="Lpassword">
        </div>
        <label class="error"><?= isset($error[0]) ? $error[0] : "" ?></label>
        <div class="center-align">
            <input class="white-text submit waves-effect waves-light" type="submit" value="Ingresar"></a>
        </div>
    <?= form_close() ?>
</div>