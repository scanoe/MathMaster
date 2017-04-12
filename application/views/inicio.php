<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<body>
    <div class="login z-depth-2 hidden" id="login">
        <?= form_open('Estudiante/login') ?>
            <div class="input-field">
                <label for="Lusername">Nombre de Usuario</label>
                <input type="text" id="Lusername" name="Lusername">
            </div>
            <div class="input-field">
                <label for = "Lpassword">Contraseña</label>
                <input type="password" id="Lpassword" name="Lpassword">
            </div>
            <label class="error"></label>
            <div class="center-align">
                <input class="white-text submit waves-effect waves-light" type="submit" value="Ingresar"></a>
            </div>
        <?= form_close() ?>
    </div>
    <div id="landing">
        <header>
            <nav>
                <a class="valign-wrapper" href=""><h1 class="valign logo">MathMaster</h1></a>
                <a href="" id="ingresar">Ingresar</a>
            </nav>
        </header>
        <div id="contenedor" class="blue">
            <section class="row contenedor container">
                <article class="col l6">
                    <div class="banner">
                        <img class="responsive-img center" src="<?= base_url('img/integralW.png') ?>">
                        <h1 class="paragrafo white-text">Aprende matemáticas y pásala bien</h1>
                    </div>
                </article>
                    <section class="col l6 white z-depth-1">
                        <h2 class = "center-align fs2 pt-32">Regístrate</h2>
                            <section class="row p0-32">
                                <?= form_open('Estudiante/registrar') ?>
                                    <div class="input-field">
                                        <label for="username">Nombre de Usuario *</label>
                                        <input type="text" id="username" name="username" value="<?= $back['username'] ?>">
                                    </div>
                                    <label class="error"><?= $errores['user'] ?></label>
                                    <div class="input-field">
                                        <label for = "nombre">Nombres *</label>
                                        <input type="text" id="nombre" name="nombre" value="<?= $back['nombres'] ?>">
                                    </div>
                                    <label class="error"><?= $errores['nombre'] ?></label>
                                    <div class="input-field">
                                        <label for = "apellidos">Apellidos *</label>
                                        <input type="text" id="apellidos" name="apellidos" value="<?= $back['apellidos'] ?>">
                                    </div>
                                    <label class="error"><?= $errores['apellido'] ?></label>
                                    <div class="input-field">
                                        <label for = "password">Contraseña *</label>
                                        <input type="password" id="password" name="password" value="<?= $back['pass'] ?>">
                                    </div>
                                    <label class="error"><?= $errores['pass'] ?></label>
                                    <label for="nacimiento" class="fs0-8">Fecha de Nacimiento *</label>
                                    <input id="nacimiento" type="date" class="datepicker" name="nacimiento"/ value="<?= $back['fecha_nacimiento'] ?>">
                                    <label class="error"><?= $errores['fecha_nacimiento'] ?></label>
                                    <p class="grey-text">Género *</p>
                                    <div class="flex">
                                        <p>
                                            <input class="with-gap" name="genero" type="radio" id="femenino" value="F"  checked/>
                                            <label class="pr-32" for="femenino">Mujer</label>
                                        </p>
                                        <p>
                                            <input class="with-gap" name="genero" type="radio" id="masculino" value="M"  />
                                            <label for="masculino">Hombre</label>
                                        </p>
                                    </div>
                                    <div class="center-align pt-24">
                                        <input class="white-text submit waves-effect waves-light" type="submit" value="Registrar"></a>
                                    </div>
                                <?= form_close() ?>
                            </section>
                    </section>         
            </section>
            <footer class="contenedor">
                <div class="row">
                    <div class="col l4 valign-wrapper course-container">
                        <img src="<?= base_url('img/calculoImagen.jpg') ?>" class="circle prev-img">
                        <p class="valign white-text fs1-3">Cálculo</p>
                    </div>
                    <div class="col l4 valign-wrapper course-container">
                        <img src="<?= base_url('img/Geometria.png') ?>" class="circle prev-img">
                        <p class="valign white-text fs1-3">Geometría</p>
                    </div>
                    <div class="col l4 valign-wrapper course-container">
                        <img src="<?= base_url('img/algebra.jpg') ?>" class="circle prev-img">
                        <p class="valign white-text fs1-3">Álgebra</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>