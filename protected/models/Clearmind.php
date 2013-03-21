<?php

Yii::import('application.models._base.BaseClearmind');

class Clearmind extends BaseClearmind
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
						'hasManyRoots'=>false
				),
		);
	}
}