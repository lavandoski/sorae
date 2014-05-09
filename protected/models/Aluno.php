<?php

/**
 * This is the model class for table "Aluno".
 *
 * The followings are the available columns in table 'Aluno':
 * @property integer $id
 * @property string $nome
 * @property string $data_nascimento
 * @property string $sexo
 * @property string $cpf
 * @property string $email
 * @property string $telefone
 * @property string $celular
 */
class Aluno extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Aluno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, data_nascimento, sexo, cpf, email, telefone, celular', 'required'),
			array('nome', 'length', 'max'=>60),
			array('sexo', 'length', 'max'=>10),
			array('cpf', 'length', 'max'=>15),
			array('email', 'length', 'max'=>50),
			array('telefone, celular', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nome, data_nascimento, sexo, cpf, email, telefone, celular', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'nome' => 'Nome',
			'data_nascimento' => 'Data Nascimento',
			'sexo' => 'Sexo',
			'cpf' => 'Cpf',
			'email' => 'Email',
			'telefone' => 'Telefone',
			'celular' => 'Celular',
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

		$criteria->compare('nome',$this->nome,true);

		$criteria->compare('data_nascimento',$this->data_nascimento,true);

		$criteria->compare('sexo',$this->sexo,true);

		$criteria->compare('cpf',$this->cpf,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('telefone',$this->telefone,true);

		$criteria->compare('celular',$this->celular,true);

		return new CActiveDataProvider('Aluno', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Aluno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}