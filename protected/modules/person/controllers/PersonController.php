<?php

class PersonController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';


	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow',  // allow admin only
				'actions'=>array('index','view','create','update','admin','delete'),
				'roles'=>array('3'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Person;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Person']))
		{
			$model->attributes=$_POST['Person'];
			if($model->save()){
				$modelLogin = new Login();
                $modelLogin->attributes = $_POST['Login'];
                $modelLogin->username = $model->id;
                $modelLogin->role = $model->type;
                
                $modelCenter = new Center();
                $modelCenter->attributes = $_POST['Center'];
                if ($modelLogin->save()){
                	//create student
                if($model->type==0){
                	$modelStudent = new Student();
                	$modelStudent->st_id = $model->id;
                	$modelStudent->cent_id = $modelCenter->cent_id;
                	if($modelStudent->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		//create professor
                if($model->type==1){
                	$modelProfessor = new Professor();
                	$modelProfessor->prof_id = $model->id;
                	$modelProfessor->cent_id = $modelCenter->cent_id;
                	if($modelProfessor->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		//create internal supervisor
                if($model->type==2){
                	$modelIntsupervisor = new Intsupervisor();
                	$modelIntsupervisor->int_supr_id = $model->id;
                	$modelIntsupervisor->cent_id = $modelCenter->cent_id;
                	if($modelIntsupervisor->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		//create external supervisor
                if($model->type==3){
                	$modelExtsupervisor = new Extsupervisor();
                	$modelExtsupervisor->ext_supr_id = $model->id;
                	if($modelExtsupervisor->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		
        }
		}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Person']))
		{
		
			$model->attributes=$_POST['Person'];
			if($model->save()){
				$modelLogin = new Login();
                $modelLogin->attributes = $_POST['Login'];
                $modelLogin->username = $model->id;
                $modelLogin->role = $model->type;
                $modelLogin->isNewRecord=false;
                if($modelLogin->saveAttributes(array('password','role'))){
                	$modelCenter = new Center();
                	$modelCenter->attributes = $_POST['Center'];
                	
            	
                	
                	//update student
                	if ($model->type==0){
                		$modelUser = new Student();
                		$modelUser->st_id=$model->id;
                		$modelUser->cent_id = $modelCenter->cent_id;
                		//$modelUser->isNewRecord = false;
                		$modelUser->save();
                		
                	}
                //update professor
                	if ($model->type==1){
                		$modelUser = new Professor();
                		$modelUser->prof_id=$model->id;
                		$modelUser->cent_id = $modelCenter->cent_id;
                		//$modelUser->isNewRecord = false;
                		$modelUser->save();
                	}
                //update Internal supervisor
                	if ($model->type==2){
                		$modelUser = new Intsupervisor();
                		$modelUser->int_supr_id=$model->id;
                		$modelUser->cent_id = $modelCenter->cent_id;
                	//	$modelUser->isNewRecord = false;
                		$modelUser->save();
                	}
                //update external supervisor
                	if ($model->type==3){
                		$modelUser = new Extsupervisor();
                		$modelUser->ext_supr_id=$model->id;
                		$modelUser->cent_id = $modelCenter->cent_id;
                	//	$modelUser->isNewRecord = false;
                	$modelUser->save();
                	}
                }
				
		}
				            		//first delete
			if (Yii::app()->session['user_role_temp']==0){
				$modelUser = new Student();
	            $modelUser->st_id = $model->id;
	            $modelUser->isNewRecord = false;
	            $modelUser->delete();
	            unset(Yii::app()->session['user_role_temp']);
	            $this->redirect(array('view','id'=>$model->id));
			}
		if (Yii::app()->session['user_role_temp']==1){
				$modelUser = new Professor();
	            $modelUser->prof_id = $model->id;
	            $modelUser->delete();
	            unset(Yii::app()->session['user_role_temp']);
	            $this->redirect(array('view','id'=>$model->id));
			}
		if (Yii::app()->session['user_role_temp']==2){
				$modelUser = new Intsupervisor();
	            $modelUser->int_supr_id = $model->id;
	            $modelUser->delete();
	            unset(Yii::app()->session['user_role_temp']);
	            $this->redirect(array('view','id'=>$model->id));
			}
		if (Yii::app()->session['user_role_temp']==3){
				$modelUser = new Extsupervisor();
	            $modelUser->ext_supr_id = $model->id;
	            $modelUser->delete();
	            unset(Yii::app()->session['user_role_temp']);
	            $this->redirect(array('view','id'=>$model->id));
			}
           
		
		}
		
		Yii::app()->session['user_role_temp'] = $model->type;
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Person');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Person('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Person']))
			$model->attributes=$_GET['Person'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Person the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Person::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	
public function getCenterList(){
		$centerlist = CHtml::listData(Center::model()->findAll(),'cent_id','name');
		return $centerlist;
	}
	/**
	 * Performs the AJAX validation.
	 * @param Person $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='person-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
