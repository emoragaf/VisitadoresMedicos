<?php

class PersonaOrganizacionController extends Controller
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
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','AddNew'),
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
		$model=new PersonaOrganizacion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['PersonaOrganizacion'])) {
			$model->attributes=$_POST['PersonaOrganizacion'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionAddNew($id)
	{
		$model=new PersonaOrganizacion;
		$model->organizacion_id = $id;
		$persona = new Persona;


		if(isset($_POST['Persona']))
        {
            $persona->attributes=$_POST['Persona'];
            if($persona->save())
            {
            	$model->persona_id = $persona->id;
            	$model->cargo = $persona->cargo;
            	$model->save();
                if (Yii::app()->request->isAjaxRequest)
                {
                	//echo CHtml::tag('li',array(),CHtml::tag('a',array('href'=>'javascript:void(0)',CHtml::tag('label',array('class'=>'checkbox'),CHtml::tag('input',array('type'=>'checkbox', 'value'=>$model->id),CHtml::encode($model->codigo),true),true),true),true),true);
                    echo CJSON::encode(array(
                        'status'=>'success', 
                        'div'=>'<option value='.$model->id.'>'.CHtml::encode($model->Persona->nombre).' '.CHtml::encode($model->Persona->apellido_p).'</option>'
                        ));
                    exit;               
                }
                else
                    $this->redirect(array('/Organizacion/view','id'=>$model->organizacion_id));
            }
        }
 
        if (Yii::app()->request->isAjaxRequest)
        {
            echo CJSON::encode(array(
                'status'=>'failure', 
                'div'=>$this->renderPartial('/persona/_formDialog', array('model'=>$persona),true, true)));
            exit;               
        }
        else
            $this->render('/persona/create',array('model'=>$persona,));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
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

		if (isset($_POST['PersonaOrganizacion'])) {
			$model->attributes=$_POST['PersonaOrganizacion'];
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
		$this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PersonaOrganizacion('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['PersonaOrganizacion'])) {
			$model->attributes=$_GET['PersonaOrganizacion'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PersonaOrganizacion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PersonaOrganizacion::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PersonaOrganizacion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='persona-organizacion-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}