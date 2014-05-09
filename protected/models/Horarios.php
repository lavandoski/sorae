<?php

/**
 * This is the model class for table "Horarios".
 *
 * The followings are the available columns in table 'Horarios':
 * @property integer $id
 * @property string $hora_inicio
 * @property string $hora_fim
 */
class Horarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Horarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hora_inicio, hora_fim', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, hora_inicio, hora_fim', 'safe', 'on'=>'search'),
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
			'turma_Horarioses' => array(self::HAS_MANY, 'TurmaHorarios', 'horario_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'hora_inicio' => 'Hora Inicio',
			'hora_fim' => 'Hora Fim',
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

		$criteria->compare('hora_inicio',$this->hora_inicio,true);

		$criteria->compare('hora_fim',$this->hora_fim,true);

		return new CActiveDataProvider('Horarios', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Horarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}