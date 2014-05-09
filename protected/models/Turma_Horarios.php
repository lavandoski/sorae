<?php

/**
 * This is the model class for table "Turma_Horarios".
 *
 * The followings are the available columns in table 'Turma_Horarios':
 * @property integer $id
 * @property integer $turma_id
 * @property integer $horario_id
 * @property string $data
 */
class Turma_Horarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Turma_Horarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('turma_id, horario_id, data', 'required'),
			array('turma_id, horario_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, turma_id, horario_id, data', 'safe', 'on'=>'search'),
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
			'chamadas' => array(self::HAS_MANY, 'Chamada', 'turma_horario_id'),
			'horario' => array(self::BELONGS_TO, 'Horarios', 'horario_id'),
			'turma' => array(self::BELONGS_TO, 'Turma', 'turma_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'turma_id' => 'Turma',
			'horario_id' => 'Horario',
			'data' => 'Data',
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

		$criteria->compare('turma_id',$this->turma_id);

		$criteria->compare('horario_id',$this->horario_id);

		$criteria->compare('data',$this->data,true);

		return new CActiveDataProvider('Turma_Horarios', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Turma_Horarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}