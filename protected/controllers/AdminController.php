<?php

class AdminController extends Controller
{
	
	public $layout = 'private';
	
	public function init()
	{
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/global.css');
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/clearmind.css');
		return parent::init();
	}
	
	/**
	 * Access control (deny all to public)
	 */
	public function filters(){
		return array( 'accessControl' );
	}
	
	public function accessRules(){
		$admin_id = Yii::app()->params["admin_id"];
		return array(
				array('allow',
						'users'=>array('@'),
						'expression'=>'$user->id == ' . $admin_id,
				),
				array('deny'),
		);
	}
	
	
	
	
	
	public function actionIndex(){
		$users = User::model()->findAll();
		$this->render('index', array('users' => $users));
	}
	
	
	
	
	
	
}