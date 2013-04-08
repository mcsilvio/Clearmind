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
	
	
}
