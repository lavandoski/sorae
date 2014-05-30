<?php

class ChamadaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			//array('deny',  // deny all users
				//'users'=>array('*'),
			//),
		);
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Chamada;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Chamada']))
		{
			$model->attributes=$_POST['Chamada'];			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Chamada']))
		{
			
			$model->attributes=$_POST['Chamada'];
			//print_r($_POST['Chamada']);die;			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	
	public function actionIndex(){
		//$this->render('index', array('data'=>$this->listaChamadaDoDia($_GET['idTH'])->readAll(),));
		$this->listarDisciplinasProfessor();
	}
	
	public function listarDisciplinasProfessor(){
		// parei aqui
		//echo Yii::app()->user->getState('professor_id');
		/*
		$q = 'SELECT COUNT(id) FROM Aluno WHERE sexo="masculino"';
		$count = Yii::app()->db->createCommand($q)->queryScalar();
		$dp = new CSqlDataProvider('SELECT * FROM Aluno WHERE sexo="masculino"',
								    array('totalItemCount' => $count,
					  					  'pagination' => array('pageSize' => 10),
										  'sort' => array('attributes' => array('nome'),
										  'defaultOrder' => array('nome' => false)))
								   );
		$this->render('index',array('dataProvider'=>$dp,));
		*/
		
		
		
		$sql = 'SELECT * FROM Aluno WHERE sexo="masculino"';		
		$rawData = Yii::app()->db->createCommand($sql); //or use ->queryAll(); in CArrayDataProvider
		$count = Yii::app()->db->createCommand('SELECT COUNT(*) FROM (' . $sql . ') as count_alias')->queryScalar(); //the count		
		$model = new CSqlDataProvider($rawData, array( //or $model=new CArrayDataProvider($rawData, array(... //using with querAll...
				'keyField' => 'id',
				'totalItemCount' => $count,		
				//if the command above use PDO parameters
				//'params'=>array(
				//':param'=>$param,
						//),		
				'sort' => array(
						'attributes' => array('id','nome', 'sexo'),
						'defaultOrder' => array(
								'id' => CSort::SORT_ASC, //default sort value
						),
				),
				'pagination' => array(
						'pageSize' => 10,
				),
		));
		
		$this->render('index', array(
				'model' => $model,
		));
		
		
	}
	
	
	public function actionChamada(){           
            $this->render('chamada', array('data'=>$this->listaChamadaDoDia($_GET['idTH'])->readAll(),));       
	}
        
     public function listaChamadaDoDia($idTurmaHorario){        
     	$sql = " SELECT th.data as data, th.id as idTurmaHorario,".
     			 " h.hora_inicio, h.hora_fim, t.id as idTurma, t.descricao as turma,".
     			 " p.nome as professor, a.*, ch.id as idChamada, ch.presenca".
     			 " FROM Turma_Horarios th".
     			 " JOIN Horarios h on th.horario_id = h.id".
     			 " JOIN Turma t on th.turma_id = t.id".
     			 " JOIN Professor_Turma pt on t.id = pt.turma_id".
     			 " JOIN Professor p on pt.professor_id = p.id".
     			 " JOIN Aluno_Turma at on t.id = at.turma_id".
     			 " JOIN Aluno a on at.aluno_id = a.id".
     			 " LEFT JOIN Chamada ch on (a.id = ch.aluno_id AND th.id = ch.turma_horario_id)".     			 
     			 " WHERE th.id = ".$idTurmaHorario.
     			 " ORDER by a.nome";
            return Yii::app()->db->createCommand($sql)->query();
        }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Chamada('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Chamada']))
			$model->attributes=$_GET['Chamada'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionPresenca(){
		$model=new Chamada;
		if($_GET['idC']>0){
			$model=Chamada::model()->findbyPk($_GET['idC']);			
		}
		$model->turma_horario_id = $_GET['thid'];
		$model->aluno_id = $_GET['aid'];
		$model->presenca = 1;
		$model->save();		
	}
	
	public function actionFalta(){
		$model=new Chamada;
		if($_GET['idC']>0){
			$model=Chamada::model()->findbyPk($_GET['idC']);
		}
		$model->turma_horario_id = $_GET['thid'];
		$model->aluno_id = $_GET['aid'];
		$model->presenca = 0;
		$model->save();
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Chamada::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='chamada-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
