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
		<div id="cmHeader">
			<div class="logoDiv"><?php echo CHtml::link('ClearMind', array('clearmind/index')); ?></div>
			<div class="rightHeaderDiv">
				<?php if(Yii::app()->user->id == Yii::app()->params['admin_id'])
					echo CHtml::link('Admin', array('admin/index')) . ' | '	;
				?>
				<?php if($this->id == 'clearmind'): ?>
				<span id="saveLink">Saved</span> 
				|
				<span id="exportText"></span>
				
				<?php
				echo CHtml::link('Export', '#', array('class'=>'linkClass','onclick'=>'{exportTree();}', 'id' => 'exportLink'));
				?>
				|
				<?php endif; ?>
				Logged in as
				<?php echo CHtml::link(Yii::app()->user->name, array('profile/index')); ?>
				|
				<?php echo CHtml::link('Log Out', array('user/logout')); ?>
			</div>
			<div style="clear: both;"></div>
		</div>

		<div id="middle">
			<?php echo $content;?>
		</div>
	</div>
</body>
</html>