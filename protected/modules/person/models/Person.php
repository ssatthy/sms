<?php

/**
 * This is the model class for table "person".
 *
 * The followings are the available columns in table 'person':
 * @property string $id
 * @property string $firstname
 * @property string $lastname
 * @property string $dateofbirth
 * @property integer $type
 *
 * The followings are the available model relations:
 * @property Extsupervisor $extsupervisor
 * @property Grade[] $grades
 * @property Intsupervisor $intsupervisor
 * @property Login $login
 * @property Professor $professor
 * @property Student $student
 */
class Person extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Person the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'person';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('type', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>32),
			array('firstname, lastname', 'length', 'max'=>45),
			array('dateofbirth', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, firstname, lastname, dateofbirth, type', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'extsupervisor' => array(self::HAS_ONE, 'Extsupervisor', 'ext_supr_id'),
			'grades' => array(self::HAS_MANY, 'Grade', 'staff_id'),
			'intsupervisor' => array(self::HAS_ONE, 'Intsupervisor', 'int_supr_id'),
			'login' => array(self::HAS_ONE, 'Login', 'username'),
			'professor' => array(self::HAS_ONE, 'Professor', 'prof_id'),
			'student' => array(self::HAS_ONE, 'Student', 'st_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'dateofbirth' => 'Dateofbirth',
			'type' => 'Type',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('dateofbirth',$this->dateofbirth,true);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}