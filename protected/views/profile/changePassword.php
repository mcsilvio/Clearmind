


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'change-password-form-changePassword-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?><br />
		<?php echo $form->passwordField($model,'password'); ?><br />
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'verifyPassword'); ?><br />
		<?php echo $form->passwordField($model,'verifyPassword'); ?><br />
		<?php echo $form->error($model,'verifyPassword'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
		<?php echo CHtml::link('Cancel', array('profile/index'), array('style' => 'margin-left: 30px;')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
