

<?php
Yii::app()->clientScript->registerScript('helloscript',"
		$('#submitButton').click(function() {
		$('#registration-form').submit();

		$('#submitButton').attr('disabled', 'true');
		$('#submitButton').val('Please Wait...');
		$('#submitButton').attr('readonly', 'true');
			
		return false;
});
		",CClientScript::POS_READY);
?>





<div class="form register border">


	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'registration-form',
			'enableAjaxValidation'=>false,
)); ?>

	<div class="regColumn">
		<div class="firstField">
			<p>
				<?php echo $form->label($model,'username'); ?>
			</p>
			<?php echo $form->textField($model,'username', array('class' => 'border formTextField')); ?>
		</div>
		<?php echo $form->error($model,'username', array('class' => 'formError')); ?>


		<div class="field">
			<p>
				<?php echo $form->label($model,'password'); ?>
			</p>
			<?php echo $form->passwordField($model,'password', array('class' => 'border formTextField')); ?>
		</div>
		<?php echo $form->error($model,'password', array('class' => 'formError')); ?>
	</div>

	<div class="regColumn">
		<div class="firstField">
			<p>
				<?php echo $form->label($model,'email'); ?>
			</p>
			<?php echo $form->textField($model,'email', array('class' => 'border formTextField')); ?>
		</div>
		<?php echo $form->error($model,'email', array('class' => 'formError')); ?>


		<div class="field">
			<p>
				<?php echo $form->label($model,'verifyPassword'); ?>
			</p>
			<?php echo $form->passwordField($model,'verifyPassword', array('class' => 'border formTextField')); ?>
		</div>
		<?php echo $form->error($model,'verifyPassword', array('class' => 'formError')); ?>


	</div>
	<div style="clear: both;"></div>
	<div class="field">
		<?php echo CHtml::link('Terms & Conditions', array('terms')); ?>
		<br />
		<?php echo CHtml::submitButton("Agree and Register", array('id' => 'submitButton', 'class' => 'submitButton')); ?>
	</div>

	<?php $this->endWidget(); ?>
</div>
<!-- form -->



