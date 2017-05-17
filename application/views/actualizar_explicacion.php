<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>parcial1</title>
</head>
<body>
<div id="container">
	<header id="header">
		<h1 Style="font-family: Arial">actualizar explicacion</h1>
	</header>
	<dic id="body">



<?= form_open('curso/cambiar_explicacion'); ?>
<div>
	<?= form_label("explicacion","explicacion"); ?>
	<?= form_input('explicacion',$explicacion,['id'=> 'explicacion']); ?>
</div>
<div>
	<?= form_hidden('id', $id);?>
</div>

<?= form_submit('','Actualizar');?>
<?= form_close(); ?>


	</div>
	<footer id ="footer">
		<p>Developed by: MathMaster Developing Team</p>
	</footer>
</div>
</body>
</html>
