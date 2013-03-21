<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/winglobal/style.css" />

    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/css/winglobal/js/cufon-yui.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/css/winglobal/js/arial.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/css/winglobal/js/cuf_run.js"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
</head>

<body>
<div class="main" >
	<div class="header">
        <div class="header_resize" >
            <div class="menu_nav">
                <?php $this->widget('zii.widgets.CMenu',array(
                    'items'=>$this->menu,
                )); ?>
            </div>    
    		<div class="logo">
                <h1><?php echo CHtml::encode(Yii::app()->name); ?><small>Brilliant painting and design</small></h1>
            </div>       
            <img class="paintImage" src="<?php echo Yii::app()->theme->baseurl?>/css/winglobal/images/Interior-Paint.jpg"></img>
            <div class="clr"></div>
        </div>     
               
	</div><!-- header -->
    <div class="clr"></div>

	<?php echo $content; ?>
    <div class="fbg">
        <div class="fbg_resize">
            <div class="col c1">
                <h2><span>Image Gallery</span></h2>
                <?php for($i=1; $i<7; $i++)
                {
                    echo '<a href="#"><img src="'.Yii::app()->theme->baseUrl.'/css/winglobal/images/thumbNail'.$i.'.jpg" width="58" height="58" alt="" /></a>';
                }?>
            </div>
            <div class="col c2">
                <h2><span>Give us a call!</span></h2>
                    <p>We proudly offer a wide array of services. From the smallest house painting job to commercial & industrial locations, from the easiest work to the most complex.
Just let us know what you want.<br /><br />We are here for you.</p>
            </div>
            <div class="col c3">
                <h2><span>Contact</span></h2>
                    <p>Mike Egan</p>
                    <p>905-580-4366</p>
                    <p>mike@eganpainting.com</p>
                    <p>2474 Lazio Lane<br />
                       Oakville, Ontario, L6M4P7</p>
            </div>
            <div class="clr"></div>
        </div>
    </div>
        <div class="footer">
            <div class="footer_resize" >
                <p class="lf" >Copyright &copy; <?php echo date('Y'); ?> by Egan Painting and Decorating.</p>
                <p class="rf" >Site by <?php echo 'Lantern Web Solutions'; ?></p>
                <div class="clr"></div>
            </div>
        </div><!-- footer -->

</div><!-- page -->

</body>
</html>
