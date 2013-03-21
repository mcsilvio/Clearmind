<?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl . '/css/main.css'); ?>
<?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl . '/css/layout.css'); ?>
<?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl . '/css/header.css'); ?>
<?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl . '/css/footer.css'); ?>
<?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl . '/css/form.css'); ?>
<?php Yii::app()->getClientScript()->registerCssFile('http://fonts.googleapis.com/css?family=Open+Sans'); ?>

<!doctype html>
<html>

<head>




 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<meta name="description" content="<?php echo CHtml::encode($this->description); ?>" /> 






</head>

<body>


	
	<div id="topBar">
		<div id="header" class="centredDiv">
		
			
			Your name here
			
			<div id="account">
				<?php if(!Yii::app()->user->isGuest) : ?>
			
					
					Logged In:
					<?php echo CHtml::link(Yii::app()->user->name, array('profile/index')); ?>
					<?php echo ' ( ' . CHtml::link('Log Out', array('user/logout')) . ' ) '; ?>		
				<?php else: ?>	
				<div style="height: 30px;display:block;width: 600px;"> &nbsp; </div>
				<?php endif; ?>
			</div>

			

			<div class="mainmenu top">
				<?php
				
				
				$menuItems = array(						
					
					
					array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>'Register', 'url'=>array('/user/register'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>'Tree', 'url'=>array('/category/tree'), 'visible'=>!Yii::app()->user->isGuest),
					
				);
				
				$this->widget('zii.widgets.CMenu',array(
						'items'=>$menuItems,
						'firstItemCssClass'=>'first',
						'lastItemCssClass'=>'last',
						'encodeLabel' => true,
      			)); 
				?>
			</div>
			 
			<div style="clear: both;"></div>
			
		</div>
		
		
		
		<div id="pageBar">
		
		<div class="leaderboard">
		
	</div>
		
				
				
	
		
		<br /><br />
			<div id="content" class="centredDiv">
				<?php echo $content; ?>
			</div>
		</div> 
		
		<div id="footer" class="centredDiv">
			<table class="footerTable">
				<tr><td colspan="2">Contact: info@funisher.com</td></tr>
				<tr><td class="leftCell"><?php echo CHtml::image(Yii::app()->request->baseurl . '/images/twitter-black.png', '', array('class' => 'footerIcon'));?></td><td class="rightCell"><a href="https://twitter.com/@funisherGames">@FunisherGames</a></td></tr>
				<tr><td class="leftCell"><?php echo CHtml::image(Yii::app()->request->baseurl . '/images/facebook-black.png', '', array('class' => 'footerIcon'));?></td><td class="rightCell"><a href="http://www.facebook.com/FunisherGames">FunisherGames</a></td></tr>
				<tr><td colspan="2"><?php echo 'Copyright 2012 Funisher Games'; ?></td></tr>				
			</table>
			<?php echo CHtml::link('Privacy Policy', array('user/privacy')); ?>
			 | 
			<?php echo CHtml::link('Terms and Conditions', array('user/terms')); ?>
		</div>
	</div>
</body>
</html>
