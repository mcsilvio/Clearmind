<?php

class ClearmindController extends BaseController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	public $layout = 'private';

	public function init()
	{
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/global.css');
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/clearmind.css');
		return parent::init();
	}

	public function behaviors()
	{
		return array(
				'jsTreeBehavior' => array('class' => 'application.behaviors.JsTreeBehavior',
						'modelClassName' => 'Node',
						'label_property' => 'title',
						'rel_property' => 'title'
				)
		);
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->render('index');
	}
}
