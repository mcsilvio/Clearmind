


<!doctype html>
<html>
<head>
<title>ClearMind - <?php echo ucfirst(Yii::app()->controller->action->id); ?>
</title>
<meta name="description" content="Hierarchical Note Taking" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
	<div class="header">
		<h1>Clearmind</h1>
	</div>

	<div class="middle">
		<?php echo $content;?>
	</div>

	<div class="footer">
		Copyright @2011 Silvio M. Costantini |
		<?php echo CHtml::link('Register', array('user/register'));?> |
		<?php echo CHtml::link('Login', array('user/login'));?>	|
		<?php echo CHtml::link('Help', array('user/help'));?>
	</div>
</body>
</html>
