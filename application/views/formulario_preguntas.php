<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>parcial1</title>
</head>
<body>
<div id="container">
	<header id="header">
		<h1 Style="font-family: Arial">Este es un ejercicio para el parcial 2</h1>
	</header>
	<dic id="body">



<?= form_open('pregunta/ingresar_pregunta'); ?>
<div>
	<?= form_label("curso","curso"); ?>
	<?= form_input('curso','1',['id'=> 'curso']); ?>
</div>
<div>
	<?= form_label("enunciado","enunciado"); ?>
	<?= form_input('enunciado','',['id'=> 'enunciado']); ?>
</div>
<div>
	<?= form_label('tipo_de_respuesta','tipo_de_respuesta');?>
	<?=form_dropdown('tipo_de_respuesta',['a'=>'Abierta','c'=>'cerrada'],'abierta',['id'=> 'tipo_de_respuesta']); ?>
</div>
<div>
	<?= form_label('respuesta','respuesta');?>
	<?=form_input('respuesta','',['id'=> 'respuesta']); ?>
</div>
<div>
	<?= form_label('respuesta_incorrecta1','respuesta_incorrecta1');?>
	<?=form_input('respuesta_incorrecta1','NULL',['id'=> 'respuesta_incorrecta1']); ?>
</div>
<div>
	<?= form_label("respuesta_incorrecta2","respuesta_incorrecta2"); ?>
	<?= form_input('respuesta_incorrecta2','NULL',['id'=> 'respuesta_incorrecta2']); ?>

</div>
<div>
	<?= form_label("respuesta_incorrecta3","respuesta_incorrecta3"); ?>
	<?= form_input('respuesta_incorrecta3','NULL',['id'=> 'respuesta_incorrecta3']); ?>
</div>
<div>


</div>
<?= form_submit('','registrar');?>
<?= form_close(); ?>


	</div>
	<footer id ="footer">
		<p>Developed by: MathMaster Developing Team</p>
	</footer>
</div>
</body>
</html>
