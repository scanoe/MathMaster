<div class="row container mt-40 p-card">
    <div class="col l8">
        <div class="p0-5p">
            <header class="center-align">
                <?=form_open_multipart(base_url()."index.php/Estudiante/editar_perfil")?>
                    <div><label>Editar nombre: </label><input type="text" name="nombre" value="<?= $nombre_completo ?>" /></div>
                    <input class="white-text submit waves-effect waves-light" type="submit" value="Editar perfil" />
                <?=form_close()?>
            </header>
        </div>
        <div class="mt-20">
            <?php foreach($errores as $error): ?>
                <p class="red-text center-align"><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</div>