<div class="container mt-40">
	<header id="header">
		<h1 class="fs2">Agregar una pregunta</h1>
	</header>	
		<?= form_open('pregunta/ingresar_pregunta/'.$id_curso); ?>
			<div class="input-field">
				<?= form_label("Enunciado","enunciado"); ?>
				<?= form_input('enunciado', isset($enunciado) ? $enunciado : "", ['id'=> 'enunciado']); ?>
			</div>
			<label class="error"><?= isset($errores['enunciado']) ? $errores['enunciado'] : '' ?></label>
			<div class="flex">
				<div>
					<input class="with-gap" name="tipo_de_respuesta" type="radio" id="abierta" value="a"  checked/>
					<label class="pr-32" for="abierta">Abierta</label>
				</div>
				<div>
					<input class="with-gap" name="tipo_de_respuesta" type="radio" id="op_multiple" value="c"  />
					<label for="op_multiple">Opcion Múltiple</label>
				</div>
			</div>
			<div class = "input-field">
				<?= form_label('Escriba la respuesta correcta','respuesta');?>
				<?=form_input('respuesta',isset($enunciado) ? $respuesta : "",['id'=> 'respuesta']); ?>
			</div>
			<label class="error"><?= isset($errores['respuesta']) ? $errores['respuesta'] : '' ?></label>
			<div id="contenedorPreguntasIncorrectas" class=<?= $tipo_de_respuesta == 'a' ? "hidden" : ""?>>
				<p class="mt-20" id="parrafo-explicativo">Ahora escriba tres respuestas incorrectas</p>
				<div class = "input-field">
					<?= form_label('Respuesta incorrecta 1','respuesta incorrecta1', ['id'=>"lri1"]);?>
					<?=form_input('respuesta_incorrecta1',isset($respuesta_incorrecta1) ? $respuesta_incorrecta1 : "",['id'=> 'respuesta_incorrecta1']); ?>
				</div>
				<div class = "input-field">
					<?= form_label("Respuesta incorrecta 2","respuesta incorrecta2", ['id'=>"lri2"]); ?>
					<?= form_input('respuesta_incorrecta2',isset($respuesta_incorrecta2) ? $respuesta_incorrecta2 : "",['id'=> 'respuesta_incorrecta2']); ?>

				</div>
				<div class = "input-field">
					<?= form_label("Respuesta incorrecta 3","respuesta incorrecta3", ['id'=>"lri3"]); ?>
					<?= form_input('respuesta_incorrecta3',isset($respuesta_incorrecta3) ? $respuesta_incorrecta3 : "",['id'=> 'respuesta_incorrecta3']); ?>
				</div>
				<label class="error"><?= isset($errores['respuesta_incorrecta']) ? $errores['respuesta_incorrecta'] : '' ?></label>
			</div>
			<div class="center-align">
				<?= form_submit('','Registrar', ['class' => 'white-text submit waves-effect waves-light']);?>
			</div>
		<?= form_close(); ?>
</div>