<?php

class RecordatorioController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters() {
     return array( 
        //it's important to add site/error, so an unpermitted user will get the error.
        array('auth.filters.AuthFilter'),
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
				'actions'=>array(),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$model=new Recordatorio;
		$model->autor_id = Yii::app()->user->getId();
		$model->fecha_creacion = date('c');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Recordatorio'])) {
			$model->attributes=$_POST['Recordatorio'];
			$model->fecha_recordatorio = date('c',strtotime($model->fecha_recordatorio));
			if ($model->save()) {
				$this->redirect(array('index'));
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

		if (isset($_POST['Recordatorio'])) {
			$model->attributes=$_POST['Recordatorio'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

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
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$user_id = Yii::app()->user->getId();
		$dataProvider=new CActiveDataProvider('Recordatorio', array(
		            'criteria'=>array(
		                'condition'=>'t.destinatario_id=:id AND leido = 0',
		                'order'=>'importancia DESC,fecha_recordatorio',
		                'params'=>array(':id'=>$user_id),
		            ),
		            'pagination'=>array(
                        'pageSize'=>4,
                    ),
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAceptar($id,$rurl= 'index'){
		$url = str_replace('-', '/', $rurl);
		$recordatorio = $this->loadModel($id);
		$recordatorio->leido = 1;
		$recordatorio->save();
		$this->redirect(array($url));
	}

	public function actionPosponer($id){
		$recordatorio = $this->loadModel($id);
		$recordatorio->posponer = 1;
		$recordatorio->fecha_posponer = date('c',strtotime('+1 day'));
		$recordatorio->save();
		$this->redirect(array('site/index'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Recordatorio('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Recordatorio'])) {
			$model->attributes=$_GET['Recordatorio'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Recordatorio the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Recordatorio::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Recordatorio $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='recordatorio-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}