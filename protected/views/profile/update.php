





<?php 
Yii::app()->clientScript->registerScript('avatarPreview','

		function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $("#avatarImage").attr("src", e.target.result);
                }

				var error = validateFile(input.files[0]);
				if(error != ""){
					alert(error);
					return;
				}
		
                reader.readAsDataURL(input.files[0]);
            }
        }
		
		function validateFile(file){
			if(file.size > 50 * 1024)
				return "File must be less than 50kb";
			
			if(file.type != "image/png" && file.type != "image/jpg" && file.type != "image/gif" && file.type != "image/jpeg" ){
				$("#avatar").val("");
				return "The file must a jpg, png, gif";
			}
		
			return "";
		}
		
		function clearAvatar(){
			$("#avatar").val("");
			$("#avatarImage").attr("src", "../images/avatars/no-image.png");
			$("#shouldClear").val("true");
		
		}

',CClientScript::POS_HEAD);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
		'htmlOptions' => array('enctype' => 'multipart/form-data',),
	
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?><br />
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?><br />
		<?php echo $form->error($model,'email'); ?>
	</div>
	


	<div class="row">
		<?php echo $form->labelEx($profile,'first_name'); ?><br />
		<?php echo $form->textField($profile,'first_name',array('size'=>45,'maxlength'=>45)); ?><br />
		<?php echo $form->error($profile,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($profile,'last_name'); ?><br />
		<?php echo $form->textField($profile,'last_name',array('size'=>45,'maxlength'=>45)); ?><br />
		<?php echo $form->error($profile,'last_name'); ?>
	</div>

	
	
	<div class="row">
	<?php echo CHtml::label('Avatar', false); ?><br />
	<?php echo CHtml::image(User::getPathToAvatar(Yii::app()->user->id), '', array('class' => 'avatar', 'id' => 'avatarImage')); ?>
	<br />
	<?php echo CHtml::fileField('avatar', '', array('onChange' => 'readURL(this);')); ?>
	<?php echo CHtml::hiddenField('clear', 'false', array('id' => 'shouldClear')); ?>
	<?php echo CHtml::link('Clear', '#', array('onClick' => 'clearAvatar();')); 
	
	?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
		<?php echo CHtml::link('Cancel', array('profile/index'));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
