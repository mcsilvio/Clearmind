



<?php 
	$imageExists = User::userHasAvatar(Yii::app()->user->id);
	
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		//'username',
		//'password',
		'email',
		'profile.emailNewsLetter',
		'profile.emailUpdates',
		'profile.daily_emails',
		//'activationcode',
		//'activated',
		'profile.first_name',
		'profile.last_name',
		'profile.birthday',
		array('label' => 'Avatar', 
			  'type' =>  'raw',
			  'value' => $imageExists ? CHtml::image(Yii::app()->baseUrl . '/images/avatars/' . Yii::app()->user->id . '.png', '', array('class' => 'avatar')) : 
	  			  		CHtml::image(Yii::app()->baseUrl . '/images/avatars/no-image.png', '', array('class' => 'avatar')),
			  'evaluateHtmlOptions'=>true,
			  'htmlOptions'=>array('style'=>'avatar'),
			),
		array('label' => 'Password', 'type' => 'raw', 'value' => CHtml::link('Change Password', array('profile/changePassword'))),
	),
)); ?>

<br />

<?php echo CHtml::link('Edit', array('profile/update'));?>

