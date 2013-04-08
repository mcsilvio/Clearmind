


<!doctype html>
<html>
<head>
<title>ClearMind - <?php echo ucfirst(Yii::app()->controller->action->id); ?>
</title>
<meta name="description" content="Hierarchical Note Taking" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>

	<div class="container">
		<div class="logoDiv">ClearMind</div>
		<div class="rightHeaderDiv">
			<?php if(Yii::app()->user->id == Yii::app()->params['admin_id'])
						echo CHtml::link('Admin', array('admin/index')) . ' | '	; 
				?>
			Logged in as
			<?php echo CHtml::link(Yii::app()->user->name, array('profile/index')); ?>
			|
			<?php echo CHtml::link('Log Out', array('user/logout')); ?>
		</div>
		<div style="clear: both;"></div>

		<div class="middle">
			<?php echo $content;?>
		</div>
	</div>
</body>
</html>
