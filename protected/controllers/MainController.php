<?php

class MainController extends Controller
{

	public function init()
	{
		$uri = Yii::app()->baseUrl . '/css/homepage.css';
		Yii::app()->clientScript->registerCssFile($uri, 'screen, projection');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.cycle.all.latest.js');
		return parent::init();
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	public function actionError(){
		$this->redirect(array('main/index'));
	}
	


}
