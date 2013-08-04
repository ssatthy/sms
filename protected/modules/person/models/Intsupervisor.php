<?php

/**
 * This is the model class for table "intsupervisor".
 *
 * The followings are the available columns in table 'intsupervisor':
 * @property string $int_supr_id
 * @property integer $cent_id
 *
 * The followings are the available model relations:
 * @property Center $cent
 * @property Person $intSupr
 */
class Intsupervisor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Intsupervisor the static model class
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
		return 'intsupervisor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('int_supr_id, cent_id', 'required'),
			array('cent_id', 'numerical', 'integerOnly'=>true),
			array('int_supr_id', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('int_supr_id, cent_id', 'safe', 'on'=>'search'),
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
			'cent' => array(self::BELONGS_TO, 'Center', 'cent_id'),
			'intSupr' => array(self::BELONGS_TO, 'Person', 'int_supr_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'int_supr_id' => 'Int Supr',
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

		$criteria->compare('int_supr_id',$this->int_supr_id,true);
		$criteria->compare('cent_id',$this->cent_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}