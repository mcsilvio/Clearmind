

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

	<table>
		<tr>
			<td><?php echo $form->label($model,'username'); ?><br /> <?php echo $form->textField($model,'username'); ?><br />
				<?php echo $form->error($model,'username'); ?>
			</td>
			<td><?php echo $form->label($model,'password'); ?><br /> <?php echo $form->passwordField($model,'password'); ?><br />
				<?php echo $form->error($model,'password'); ?>
			</td>
		</tr>

		<tr>
			<td><?php echo $form->label($model,'verifyPassword'); ?><br /> <?php echo $form->passwordField($model,'verifyPassword'); ?><br />
				<?php echo $form->error($model,'verifyPassword'); ?>
			</td>
			<td><?php echo $form->label($model,'email'); ?><br /> <?php echo $form->textField($model,'email'); ?><br />
				<?php echo $form->error($model,'email'); ?>
			</td>
		</tr>

		<tr>
			<td><?php echo $form->label($model,'emailNewsLetter'); ?><br /> <?php echo $form->checkBox($model, 'emailNewsLetter');?><br />
				<?php echo $form->error($model,'emailNewsLetter'); ?>
			</td>
			<td><?php echo $form->label($model,'emailUpdates'); ?><br /> <?php echo $form->checkBox($model, 'emailUpdates');?><br />
				<?php echo $form->error($model,'emailUpdates'); ?>
			</td>
		</tr>

		<tr>
			<td><?php echo $form->label($model,'verifyCode'); ?><br /> <?php $this->widget('CCaptcha', array('buttonOptions' => array('style' => 'display:block'))); ?>
				<?php echo CHtml::activeTextField( $model,'verifyCode', array('class'=>'captcha')); ?><br />
				<?php echo $form->error($model,'verifyCode'); ?>
			</td>
			<td><?php echo $form->label($model,'termsAgreed'); ?><br /> <?php echo $form->checkBox($model, 'termsAgreed');?>
				<?php echo 'I accept the ' . CHtml::link('Terms & Conditions', array('terms'));?>
				<?php echo $form->error($model,'termsAgreed'); ?>
			</td>
		</tr>

		<tr>
			<td colspan=2><?php echo CHtml::submitButton("Register", array('id' => 'submitButton')); ?>
			</td>
		</tr>
	</table>













	<?php $this->endWidget(); ?>
</div>
<!-- form -->



