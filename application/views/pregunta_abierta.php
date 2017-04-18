<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="mt-40">
		<div class="progress_bar">
			<div class="progress w<?= $progress ?>"></div>
		</div>
		<div class="row">
			<div class="col l10">
				<p class="fs1-5"><?= $pregunta->enunciado ?></p>
				<?= form_open('pregunta/responder_pregunta/'.$pregunta->id."/".$contador); ?>
				<div>
					<?= form_label("","respuesta"); ?>
					<?= form_input('grupo-preguntas','',['id'=> 'respuesta']); ?>
				</div>
				<div class="center-align">
					<input class="white-text submit waves-effect waves-light" type="submit" value="Responder">
				</div>
				<?= form_close(); ?>
			</div>
			<div class="col l2 opciones-pregunta">
				<a class="fs1-5 opcion-pregunta-wrapper waves-effect waves-light blue cambiar-pregunta" href="<?= base_url() ?>index.php/pregunta/cambiar_pregunta/<?= $pregunta->id ?>/<?= $contador ?>"><i class="material-icons fs1-5 white-text posicion-iconos-opciones-respuesta">swap_horiz</i>Cambiar la pregunta</a>
				<a class="fs1-5 opcion-pregunta-wrapper waves-effect waves-light blue ver-respuesta" href=""><i class="material-icons fs1-5 white-text posicion-iconos-opciones-respuesta">remove_red_eye</i></a>
			</div>
		</div>
	</div>
</div>
<p class="cambiar-pregunta-texto hidden">Cambiar pregunta 2<i class="material-icons monedas fs1-1">monetization_on</i></p>
<p class="ver-respuesta-texto hidden">Ver la respuesta 10<i class="material-icons monedas fs1-1">monetization_on</i></p>