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
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/privateLayout.css');
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/clearmind.css');
		return parent::init();
	}
	
	public function filters()
	{
		return array( 'accessControl' ); // perform access control for CRUD operations
	}
	
	public function accessRules()
	{
		return array(
				array('allow', // allow authenticated users to access all actions
						'users'=>array('@'),
				),
	
				
				array('deny'),
		);
	}

	public function behaviors()
	{
		return array(
				'jsTreeBehavior' => array('class' => 'application.behaviors.JsTreeBehavior',
						'modelClassName' => 'Node',
						'label_property' => 'title',
						'rel_property' => 'title',
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
	
	public function actionExportTree(){
		
		//id of node to export
		$id = $_POST['id'];
		
		//variables
		$exportText = "";
		$section = "";
		$root = Node::model()->findByPk($id);
		
		//traverse tree, creating text
		$exportText .= $root->title . "\r\n\r\n";
		$exportText .= trim($root->content) . "\r\n\r\n";
		
		$this->traverseChildrenAndWrite($root, $exportText, $section);

		//save file
		$path = realpath(Yii::app()->basePath . '/../tmp');
		$tmpfname = tempnam($path, "export_");
		file_put_contents($tmpfname, $exportText);
		
		//return path
		echo $tmpfname;
		
		
		
	}
	
	public function actionSetVar()
	{
		session_start();
		$_SESSION['file'] = $_POST['var'];
	}
	
	public function actionDownloadFile()
	{
		
		session_start();
		error_log($_SESSION['file']);
		
		$tmpfname = $_SESSION['file'];
		$exportText = file_get_contents($tmpfname);
		$title = strtok($exportText, "\r\n");
	
		unlink($tmpfname);
		
		return Yii::app()->getRequest()->sendFile(basename($title . '.txt'), $exportText);
	}
	
	public function traverseChildrenAndWrite(&$node, &$exportText, $section)
	{
		$subsection = 0;
		$sectionstring = ($section != "") ? $section . "." : "";
		
		foreach($node->children()->findAll() as $child)
		{
						
			$exportText .= $sectionstring . ++$subsection . " " . trim($child->title) . "\r\n\r\n";
			$exportText .= trim($child->content) . "\r\n\r\n";
			
			
			$this->traverseChildrenAndWrite($child, $exportText, ($sectionstring . $subsection));
		}
	}
		
	
}
