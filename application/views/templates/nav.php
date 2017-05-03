<header>
    <nav>
        <a class="valign-wrapper" href="<?= base_url() ?>/index.php/Curso/cargar_lista_cursos"><h1 class="valign logo">MathMaster</h1></a>
        <div>
            <ul>
                <li><a href="<?= base_url() ?>/index.php/Estudiante/cargar_tabla_de_puntuaciones" id="tabla_puntuaciones">Tabla de puntuaciones</a></li>
                <li class="flex p0-1em"><img src="<?= base_url("img/ic_monetization_on_white_24px.svg") ?>" ><p><?= $monedas ?></p></li>
                <li><a href="" id="settings"><?= $nombre ?></a></li>
            </ul>
        </div>
    </nav>
    <div class="collection settings hidden" id="settings-container">
        <ul>
            <li><a href="<?= base_url() ?>/index.php/Estudiante/cargar_perfil" class="collection-item blue-text right-align">Ver tu perfil</a></li>
            <li><a href="<?= base_url() ?>/index.php/Estudiante/cerrar_sesion" class="collection-item blue-text right-align">Cerrar Sesión</a></li>
        </ul>
    </div>  
</header>