<?php Yii::app()->getClientScript()->registerCssFile('http://fonts.googleapis.com/css?family=Open+Sans'); ?>


<!doctype html>
<html>
<head>
<title>ClearMind - Home</title>
<meta name="description" content="Hierarchical Note Taking" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" type="text/css" rel="stylesheet" />

</head>

<body>
	<div id="header" class="center">
		<h1>Clearmind</h1>
	</div>

	<?php echo $content;?>

	<div id="footer" class="center">
		Copyright @2011 ClearmindApp |
		<?php echo CHtml::link('Register', array('user/register'));?> |
		<?php echo CHtml::link('Login', array('user/login'));?> |
		<?php echo CHtml::link('Help', array('user/help'));?>
	</div>
</body>
</html>
