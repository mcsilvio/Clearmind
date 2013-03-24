

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

	<table class="registerTable">
		<tr class="managedRow">
			<td><?php echo $form->label($model,'username'); ?><br /> <?php echo $form->textField($model,'username', array('class' => 'border formTextField')); ?><br />
				<?php echo $form->error($model,'username'); ?>
			</td>
			<td>
			<?php echo $form->label($model,'email'); ?><br /> <?php echo $form->textField($model,'email', array('class' => 'border formTextField')); ?><br />
				<?php echo $form->error($model,'email'); ?>
			
			</td>
			
		</tr>

		<tr class="managedRow">
			<td>
			<?php echo $form->label($model,'password'); ?><br /> <?php echo $form->passwordField($model,'password', array('class' => 'border formTextField')); ?><br />
				<?php echo $form->error($model,'password'); ?>
			</td>
			<td>
			<?php echo $form->label($model,'verifyPassword'); ?><br /> <?php echo $form->passwordField($model,'verifyPassword', array('class' => 'border formTextField')); ?><br />
				<?php echo $form->error($model,'verifyPassword'); ?>
			
			</td>
		</tr>

		

		

		<tr>
			<td colspan=2>
			<?php echo CHtml::link('Terms & Conditions', array('terms')); ?><br />
			<?php echo CHtml::submitButton("Agree and sRegister", array('id' => 'submitButton')); ?>
			</td>
		</tr>
	</table>













	<?php $this->endWidget(); ?>
</div>
<!-- form -->



