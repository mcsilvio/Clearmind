
<div class="form login border">
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableAjaxValidation'=>false,
	));?>


	<div class="firstField">
		<p>Username</p>
		<?php echo $form->textField($model,'username', array('class' => 'border formTextField')); ?>
	</div>
		<?php echo $form->error($model,'username', array('class' => 'formError')); ?>

	
	<div class="field">
		<p>Password</p>
		<?php echo $form->passwordField($model,'password', array('class' => 'border formTextField')); ?>
	</div>
		<?php echo $form->error($model,'password', array('class' => 'formError')); ?>
	
	<div class="field">
		<?php echo CHtml::link('Forgot Password?', array('/user/forgotPassword'));?>
	</div>
	<div>
		<?php echo CHtml::submitButton('Login', array('class' => 'submitButton')); ?>
	</div>

	<?php $this->endWidget(); ?>
</div>
<!-- form -->
