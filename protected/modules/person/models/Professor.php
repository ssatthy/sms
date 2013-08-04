<?php

/**
 * This is the model class for table "professor".
 *
 * The followings are the available columns in table 'professor':
 * @property string $prof_id
 * @property integer $cent_id
 *
 * The followings are the available model relations:
 * @property Class[] $classes
 * @property Center $cent
 * @property Person $prof
 */
class Professor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Professor the static model class
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
		return 'professor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('prof_id, cent_id', 'required'),
			array('cent_id', 'numerical', 'integerOnly'=>true),
			array('prof_id', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('prof_id, cent_id', 'safe', 'on'=>'search'),
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
			'classes' => array(self::HAS_MANY, 'Class', 'prof_id'),
			'cent' => array(self::BELONGS_TO, 'Center', 'cent_id'),
			'prof' => array(self::BELONGS_TO, 'Person', 'prof_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'prof_id' => 'Prof',
			'cent_id' => 'Cent',
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

		$criteria->compare('prof_id',$this->prof_id,true);
		$criteria->compare('cent_id',$this->cent_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}