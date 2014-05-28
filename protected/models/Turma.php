<?php

/**
 * This is the model class for table "Turma".
 *
 * The followings are the available columns in table 'Turma':
 * @property integer $id
 * @property integer $disciplina_id
 * @property string $descricao
 */
class Turma extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Turma';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('disciplina_id, descricao', 'required'),
			array('disciplina_id', 'numerical', 'integerOnly'=>true),
			array('descricao', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, disciplina_id, descricao', 'safe', 'on'=>'search'),
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
			'aluno_Turmas' => array(self::HAS_MANY, 'AlunoTurma', 'turma_id'),
			'professor_Turmas' => array(self::HAS_MANY, 'ProfessorTurma', 'turma_id'),
			'disciplina' => array(self::BELONGS_TO, 'Disciplina', 'disciplina_id'),
			'turma_Horarioses' => array(self::HAS_MANY, 'TurmaHorarios', 'turma_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'disciplina_id' => 'Disciplina',
			'descricao' => 'Descricao',
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

		$criteria->compare('disciplina_id',$this->disciplina_id);

		$criteria->compare('descricao',$this->descricao,true);

		return new CActiveDataProvider('Turma', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Turma the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}