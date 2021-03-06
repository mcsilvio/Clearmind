<?php

/**
 * This is the model base class for the table "node".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Node".
 *
 * Columns in table "node" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $id
 * @property integer $user_id
 * @property string $root
 * @property string $lft
 * @property string $rgt
 * @property integer $level
 * @property string $title
 * @property string $content
 *
 */
abstract class BaseNode extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'node';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Node|Nodes', $n);
	}

	public static function representingColumn() {
		return 'title';
	}

	public function rules() {
		return array(
			array('user_id, lft, rgt, level, title', 'required'),
			array('user_id, level', 'numerical', 'integerOnly'=>true),
			array('root, lft, rgt', 'length', 'max'=>10),
			array('title', 'length', 'max'=>255),
			array('root', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, user_id, root, lft, rgt, level, title, content', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'user_id' => Yii::t('app', 'User'),
			'root' => Yii::t('app', 'Root'),
			'lft' => Yii::t('app', 'Lft'),
			'rgt' => Yii::t('app', 'Rgt'),
			'level' => Yii::t('app', 'Level'),
			'title' => Yii::t('app', 'Title'),
			'content' => Yii::t('app', 'Content'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('root', $this->root, true);
		$criteria->compare('lft', $this->lft, true);
		$criteria->compare('rgt', $this->rgt, true);
		$criteria->compare('level', $this->level);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('content', $this->content, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}