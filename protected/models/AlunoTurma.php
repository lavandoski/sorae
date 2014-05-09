<?php

/**
 * This is the model class for table "Aluno_Turma".
 *
 * The followings are the available columns in table 'Aluno_Turma':
 * @property integer $id
 * @property integer $aluno_id
 * @property integer $turma_id
 */
class Aluno_Turma extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Aluno_Turma';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('aluno_id, turma_id', 'required'),
			array('aluno_id, turma_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, aluno_id, turma_id', 'safe', 'on'=>'search'),
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
			'turma' => array(self::BELONGS_TO, 'Turma', 'turma_id'),
			'aluno' => array(self::BELONGS_TO, 'Aluno', 'aluno_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'aluno_id' => 'Aluno',
			'turma_id' => 'Turma',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('aluno_id',$this->aluno_id);

		$criteria->compare('turma_id',$this->turma_id);

		return new CActiveDataProvider('Aluno_Turma', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Aluno_Turma the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}