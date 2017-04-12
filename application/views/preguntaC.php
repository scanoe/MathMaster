<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>responder preguntas</title>
</head>
<body>
<div id="container">
	<header id="header">
		<h1 Style="font-family: Arial">Pregunta</h1>
	</header>
	<dic id="body">
		<h2>Enunciado</h2>
		<p><?php echo $pregunta->enunciado ?></p>

		<?= form_open('pregunta/responder_pregunta/'.$pregunta->id."/".$contador); ?>
		<div>
			<?= form_radio("respuesta",$pregunta->respuesta,FALSE,['id'=> 'respuesta']); ?>
			<?= form_label($pregunta->respuesta,"respuesta"); ?>
		</div>
		<div>
			<?= form_radio("respuesta",$pregunta->respuesta_incorrecta1,FALSE,['id'=> 'respuesta']); ?>
			<?= form_label($pregunta->respuesta_incorrecta1,"respuesta"); ?>
		</div>
		<div>
			<?= form_radio("respuesta",$pregunta->respuesta_incorrecta2,FALSE,['id'=> 'respuesta']); ?>
			<?= form_label($pregunta->respuesta_incorrecta2,"respuesta"); ?>
		</div>
		<div>
			<?= form_radio("respuesta",$pregunta->respuesta_incorrecta3,FALSE,['id'=> 'respuesta']); ?>
			<?= form_label($pregunta->respuesta_incorrecta3,"respuesta"); ?>
		</div>

	
		<?= form_submit('','responder');?>
		<?= form_close(); ?>






	</div>
	<footer id ="footer">
		<p>Developed by: MathMasters developing team</p>
	</footer>
</div>
</body>
</html>
