<?php

/**
 * This is the model class for table "center".
 *
 * The followings are the available columns in table 'center':
 * @property integer $cent_id
 * @property string $name
 * @property string $location
 *
 * The followings are the available model relations:
 * @property Class[] $classes
 * @property Extsupervisor[] $extsupervisors
 * @property Intsupervisor[] $intsupervisors
 * @property Professor[] $professors
 * @property Student[] $students
 */
class Center extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Center the static model class
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
		return 'center';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cent_id', 'required'),
			array('cent_id', 'numerical', 'integerOnly'=>true),
			array('name, location', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cent_id, name, location', 'safe', 'on'=>'search'),
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
			'classes' => array(self::MANY_MANY, 'Class', 'centerclass(cent_id, cl_id)'),
			'extsupervisors' => array(self::MANY_MANY, 'Extsupervisor', 'extsupcenter(cent_id, ext_supr_id)'),
			'intsupervisors' => array(self::HAS_MANY, 'Intsupervisor', 'cent_id'),
			'professors' => array(self::HAS_MANY, 'Professor', 'cent_id'),
			'students' => array(self::HAS_MANY, 'Student', 'cent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cent_id' => 'Center ID',
			'name' => 'Center Name',
			'location' => 'Location',
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

		$criteria->compare('cent_id',$this->cent_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('location',$this->location,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}