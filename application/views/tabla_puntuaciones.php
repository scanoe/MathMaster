<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="blue">
    <div class="container row white contenedor-tabla z-depth-3">
        <div class="col s12 mb-20">
            <header class="center-align mt-40 mb-40">
                <h1 class="fs2">Tabla de posiciones</h1>
            </header>
            <section class="lideres">
                <div class= "row">
                    <?php if($segundo_estudiante != null){ ?>
                        <div class="col l4 center-align mt-20">
                            <article class="segundo">
                                <figure>
                                    <img class="responsive-img center" src="<?= base_url("img/usuario80px.jpg") ?>" alt="">
                                </figure>
                                <p class="grey-text lighten-1">#2</p>
                                <h2><?= $segundo_estudiante->nombre ?></h2>
                                <p class="grey-text lighten-1"><?= $segundo_estudiante->puntos ?></P>
                            </article>
                        </div>
                    <?php } ?>
                    <?php if($primer_estudiante != null){ ?>
                        <div class="col l4 center-align">
                            <article class="primero">
                                <figure>
                                    <img class="responsive-img center" src="<?= base_url("img/usuario.jpg") ?>" alt="">
                                </figure>
                                <p class="grey-text lighten-1">#1</p>
                                <h2><?= $primer_estudiante->nombre ?></h2>
                                <p class="grey-text lighten-1"><?= $primer_estudiante->puntos ?></P>
                            </article>
                        </div>
                    <?php } 
                    if($tercer_estudiante != null){ ?>
                        <div class="col l4 center-align mt-20">
                            <article class="segundo">
                                <figure>
                                    <img class="responsive-img center" src="<?= base_url("img/usuario80px.jpg") ?>" alt="">
                                </figure>
                                <p class="grey-text lighten-1">#3</p>
                                <h2><?= $tercer_estudiante->nombre ?></h2>
                                <p class="grey-text lighten-1"><?= $tercer_estudiante->puntos ?></P>
                            </article>
                        </div>
                    <?php } ?>
                </div>
            </section>
        </div>
        <div class="col s12">
            <section class="tabla_posiciones">
                <table class="highlight">   
                    <?php foreach($estudiantes as $key => $estudiante): ?>
                        <tr class="entrada-tabla">
                            <td class="grey-text lighten-1 center-align">#<?= $key + 4 ?></td>
                            <td>
                                <figure class="p10-0">
                                    <img src="<?= base_url('img/usuario50px.jpg') ?>" alt="">
                                </figure>
                            </td>
                            <td>
                                <h3><?= $estudiante->nombre ?></h3>
                            </td>
                            <td class="grey-text lighten-1 center-align"><p><?= $estudiante->puntos ?> EXP</p></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </section>
        </div>
    </div>
</div>