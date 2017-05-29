<div class="container mt-40">
	<header>
		<h1 class="fs2">Actualizar explicacion</h1>
	</header>
	<div>
		<?= form_open('curso/cambiar_explicacion'); ?>
			<div class="input-field mt-20">
				<textarea id="explicacion" name="explicacion" class="materialize-textarea"><?= $explicacion ?></textarea>
            	<label for="explicacion">Explicación</label>				
			</div>
			<p class="error"><?= $error ?></p>
			<div>
				<?= form_hidden('id', $id);?>
			</div>
			<div class="center-align">
				<?= form_submit('', 'Actualizar explicación', ['class' => 'white-text submit waves-effect waves-light']);?>
			</div>
		<?= form_close(); ?>		
	</div>
</div>