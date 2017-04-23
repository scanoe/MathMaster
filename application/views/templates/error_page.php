<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<header>
    <nav>
        <a class="valign-wrapper" href="<?= base_url() ?>/index.php/Inicio/index"><h1 class="valign logo">MathMaster</h1></a>
    </nav>
</header>
<div class="blue pt-40" id="error-container">
    <img class="center" src="<?= base_url('img/error-img.png') ?>">
    <p class="center pt-40 fs1-5 white-text">Ohh.....Has solicitado una página que ya no está acá</p>
    <div class="flex-center mt-40">
        <a href="<?= base_url() ?>/index.php/Inicio/index" class="waves-effect waves-dark btn white blue-text">Ir al inicio</a>
    </div>
</div>