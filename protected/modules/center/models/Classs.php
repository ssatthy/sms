<?php

/**
 * This is the model class for table "class".
 *
 * The followings are the available columns in table 'class':
 * @property string $cl_id
 * @property string $year
 * @property integer $semester
 * @property string $prof_id
 * @property string $mod_id
 *
 * The followings are the available model relations:
 * @property Center[] $centers
 * @property Module $mod
 * @property Professor $prof
 * @property Student[] $students
 */
class Classs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Classs the static model class
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
		return 'class';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cl_id, prof_id, mod_id', 'required'),
			array('semester', 'numerical', 'integerOnly'=>true),
			array('cl_id, year, prof_id, mod_id', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cl_id, year, semester, prof_id, mod_id', 'safe', 'on'=>'search'),
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
			'centers' => array(self::MANY_MANY, 'Center', 'centerclass(cl_id, cent_id)'),
			'mod' => array(self::BELONGS_TO, 'Module', 'mod_id'),
			'prof' => array(self::BELONGS_TO, 'Professor', 'prof_id'),
			'students' => array(self::MANY_MANY, 'Student', 'classentrolled(cl_id, st_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cl_id' => 'Cl',
			'year' => 'Year',
			'semester' => 'Semester',
			'prof_id' => 'Prof',
			'mod_id' => 'Mod',
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

		$criteria->compare('cl_id',$this->cl_id,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('semester',$this->semester);
		$criteria->compare('prof_id',$this->prof_id,true);
		$criteria->compare('mod_id',$this->mod_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}