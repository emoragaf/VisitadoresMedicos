<?php

class OrganizacionController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
		$visitas = Visita::model()->findAll(array("condition"=>"organizacion_id =  $id",'order'=>'fecha_programada DESC'));
		$farmacosActuales = FarmacoActualOrganizacion::model()->findAll(array('condition'=>'organizacion_id ='.$id));
		$farmacosPotenciales = FarmacoPotencialOrganizacion::model()->findAll(array('condition'=>'organizacion_id ='.$id));

		$this->render('view',array(
			'farmacosPotenciales'=>$farmacosPotenciales,
			'farmacosActuales'=>$farmacosActuales,
			'model'=>$this->loadModel($id),
			'visitas'=>$visitas,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Organizacion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Organizacion'])) {
			$model->attributes=$_POST['Organizacion'];
			$model->cantidad_camas = $model->cant_camas_maternidad + $model->cant_camas_quirurgicos +$model->cant_camas_pediatria + $model->cant_camas_criticas;
			$model->user_visible = Yii::app()->user->id;
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionAccesoUser()
	{
		$orgs= Organizacion::model()->findAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['visible'])) {
			foreach ($_POST['visible'] as $key => $value) {
				$org = Organizacion::model()->findByPk($key);
				$org->user_visible = $value;
				$org->save();
			}
			$this->redirect(array('Site/admin'));
		}

		$this->render('accesoUser',array(
			'organizaciones'=>$orgs,
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

		if (isset($_POST['Organizacion'])) {
			$model->attributes=$_POST['Organizacion'];
			$model->cantidad_camas = $model->cant_camas_maternidad + $model->cant_camas_quirurgicos +$model->cant_camas_pediatria + $model->cant_camas_criticas;
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
		$dataProvider=new CActiveDataProvider('Organizacion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Organizacion('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Organizacion'])) {
			$model->attributes=$_GET['Organizacion'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Organizacion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Organizacion::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Organizacion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='organizacion-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}