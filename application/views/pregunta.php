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
			<br><?= form_label("","respuesta"); ?></br>
			<?= form_input('respuesta','',['id'=> 'respuesta']); ?>
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
