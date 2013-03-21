<?php 
$this->pageTitle = 'Funisher: A Message';
$this->description = 'Funisher has something to say to you.'; 
?>


<?php
$this->pageTitle=Yii::app()->name . ' - ' . CHtml::encode($title);
?>

<h1><?php echo CHtml::encode($title);?></h1>

<p>
<?php echo CHtml::encode($message); ?>
</p>