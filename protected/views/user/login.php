
<div class="form login border">
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableAjaxValidation'=>false,
	));?>


	
		<p class="label">Username</p>
		
		<?php echo $form->textField($model,'username', array('class' => 'border formTextField')); ?>
		<br />
		<?php echo $form->error($model,'username'); ?>
	

	
		<p class="label">Password</p>
		
		<?php echo $form->passwordField($model,'password', array('class' => 'border formTextField')); ?>
		<br />
		<?php echo $form->error($model,'password'); ?>
	

	<div class="row">
		<?php echo CHtml::link('Forgot Password?', array('/user/forgotPassword'));?>
	</div>

	<div class="row submit">
		<?php echo CHtml::submitButton('Login', array('class' => 'submitButton')); ?>
	</div>

	<?php $this->endWidget(); ?>
</div>
<!-- form -->
