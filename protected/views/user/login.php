<?php 
$this->pageTitle = 'Funisher: Log-In';
$this->description = 'Log-in to do all the cool stuff.'; 
?>


<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableAjaxValidation'=>false,
)); ?>


	<div class="row">
		<?php echo $form->label($model,'username'); ?><br />
		<?php echo $form->textField($model,'username'); ?><br />
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'password'); ?><br />
		<?php echo $form->passwordField($model,'password'); ?><br />
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?><br />
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>
	
	<div class="row">
	<?php echo CHtml::link('Forgot Password?', array('/user/forgotPassword'));?>
	</div>

	<div class="row submit">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
