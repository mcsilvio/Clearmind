<?php

/**
 * This is the model base class for the table "profile".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Profile".
 *
 * Columns in table "profile" available as properties of the model,
 * followed by relations of table "profile" available as properties of the model.
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $birthday
 * @property integer $emailNewsLetter
 * @property integer $emailUpdates
 * @property integer $daily_emails
 * @property string $last_emailed
 *
 * @property User $user
 */
abstract class BaseProfile extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'profile';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Profile|Profiles', $n);
	}

	public static function representingColumn() {
		return 'last_emailed';
	}

	public function rules() {
		return array(
			array('user_id, last_emailed', 'required'),
			array('user_id, emailNewsLetter, emailUpdates, daily_emails', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>45),
			array('birthday', 'safe'),
			array('first_name, last_name, birthday, emailNewsLetter, emailUpdates, daily_emails', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, user_id, first_name, last_name, birthday, emailNewsLetter, emailUpdates, daily_emails, last_emailed', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'user_id' => null,
			'first_name' => Yii::t('app', 'First Name'),
			'last_name' => Yii::t('app', 'Last Name'),
			'birthday' => Yii::t('app', 'Birthday'),
			'emailNewsLetter' => Yii::t('app', 'Email News Letter'),
			'emailUpdates' => Yii::t('app', 'Email Updates'),
			'daily_emails' => Yii::t('app', 'Daily Emails'),
			'last_emailed' => Yii::t('app', 'Last Emailed'),
			'user' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('first_name', $this->first_name, true);
		$criteria->compare('last_name', $this->last_name, true);
		$criteria->compare('birthday', $this->birthday, true);
		$criteria->compare('emailNewsLetter', $this->emailNewsLetter);
		$criteria->compare('emailUpdates', $this->emailUpdates);
		$criteria->compare('daily_emails', $this->daily_emails);
		$criteria->compare('last_emailed', $this->last_emailed, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}