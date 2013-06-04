<?php

Yii::import('application.models._base.BaseNode');

class Node extends BaseNode
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function behaviors()
	{
		return array(
				'NestedSetBehavior'=>array(
						'class'=>'application.behaviors.NestedSetBehavior',
						'leftAttribute'=>'lft',
						'rightAttribute'=>'rgt',
						'levelAttribute'=>'level',
						'hasManyRoots'=>true
				),
		);
	}
	
	public function rules() {
		return array(
				
				array('user_id, level', 'numerical', 'integerOnly'=>true),
				array('root, lft, rgt', 'length', 'max'=>10),
				array('title', 'length', 'max'=>255),
				array('root', 'default', 'setOnEmpty' => true, 'value' => null),
				array('id, user_id, root, lft, rgt, level, title, content', 'safe', 'on'=>'search'),
		);
	}
	
	public function defaultScope()
	{
		return array(
				'condition'=>"user_id = " . Yii::app()->user->id,
		);
	}
	
	public function beforeSave(){
		if(parent::beforeSave())
		{
			// for example
			$this->user_id = Yii::app()->user->id; // if you save dates as INT
			return true;
		}
		return false;
	}
	
	public static function CreateDefaultTree($for_user_id)
	{
		Yii::app()->db->createCommand('INSERT INTO node (SELECT NULL, ' . $for_user_id . ' as user_id, root, lft, rgt, level, title, content FROM node WHERE user_id = -1)')->query();
	}
	
	
}
