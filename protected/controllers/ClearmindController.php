<?php

class ClearmindController extends BaseController
{
	
	public function init()
	{
		$uri = Yii::app()->baseUrl . '/css/clearmind.css';
		Yii::app()->clientScript->registerCssFile($uri);
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.js');
		return parent::init();
	}
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function behaviors()
	{
		return array(
				'jsTreeBehavior' => array('class' => 'application.behaviors.JsTreeBehavior',
						'form_alias_path' => 'application.views.clearmind._form',
						'view_alias_path' => 'application.views.clearmind.view',
						'modelClassName' => 'Clearmind',
						'label_property' => 'node_title',
						'rel_property' => 'node_title',
				)
		);
	}
	
	/**
	 * Lists all models.
	 */
	public function actionTree()
	{
		$this->render('tree');
	}
	
	
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'clearmind-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}