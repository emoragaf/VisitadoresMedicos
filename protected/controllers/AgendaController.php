<?php

class AgendaController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','semana'),
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
	public function actionCreate($fecha = null)
	{
		setlocale(LC_TIME, 'es_ES.UTF-8');

		$model=new Agenda;
		$model->user_id = Yii::app()->user->getId();
		$fechas = array();
		if(!$fecha){
			for($i=0; $i<7; $i++){
				if ($i == 0){
					if(date('N',strtotime('now')) != 6 && date('N',strtotime('now')) != 7){
						$fechas[date('Y-m-d',strtotime('now'))] = ucfirst(strftime('%A',strtotime('now'))).' '.date('d-m-Y',strtotime('now'));
					}
				}
				else{
					if(date('N',strtotime($i.' day')) != 6 && date('N',strtotime($i.' day')) != 7){
						$fechas[date('Y-m-d',strtotime($i.' day'))] = ucfirst(strftime('%A',strtotime($i.' day'))).' '.date('d-m-Y',strtotime($i.' day'));
					}
				}
			}
		}
		if($fecha){
			for($i=0; $i<7; $i++){
				if ($i == 0){
					if(date('N',strtotime($fecha)) != 6 && date('N',strtotime($fecha)) != 7){
						$fechas[date('Y-m-d',strtotime($fecha))] = ucfirst(strftime('%A',strtotime($fecha))).' '.date('d-m-Y',strtotime($fecha));
					}
				}
				else{
					if(date('N',strtotime($i.' day',strtotime($fecha))) != 6 && date('N',strtotime($i.' day',strtotime($fecha))) != 7){
						$fechas[date('Y-m-d',strtotime($i.' day',strtotime($fecha)))] = ucfirst(strftime('%A',strtotime($i.' day',strtotime($fecha)))).' '.date('d-m-Y',strtotime($i.' day',strtotime($fecha)));
					}
				}
			}
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Agenda'])) {
			$model->attributes=$_POST['Agenda'];
			if ($model->save()) {
				$this->redirect(array('agenda/index'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'fechas'=>$fechas,
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

		if (isset($_POST['Agenda'])) {
			$model->attributes=$_POST['Agenda'];
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


		//$dataProvider=new CActiveDataProvider('Agenda');
		$hoy = date('N',strtotime('now'));

		$offsetLunes = $hoy - 1;
		$offsetViernes = 5 - $hoy;
		
		if($offsetLunes == 0)
			$fecha_min = date('Y-m-d',strtotime('now'));
		else
			$fecha_min = date('Y-m-d',strtotime('-'.$offsetLunes.' day'));

		if($hoy == 6)
			$fecha_max = date('Y-m-d',strtotime('-1 day'));
		if($hoy == 7)
			$fecha_max = date('Y-m-d',strtotime('-2 day'));
		if($offsetViernes == 0)
			$fecha_max = date('Y-m-d',strtotime('now'));
		else
			$fecha_max = date('Y-m-d',strtotime('+'.$offsetViernes.' day'));

		$semana = array();
		for($i=0; $i<7; $i++){
			if ($i == 0)
				$semana[date('Y-m-d',strtotime($fecha_min))] = array();
			else
				$semana[date('Y-m-d',strtotime($i.' day',strtotime($fecha_min)))] = array();
		}

		$criteria = new CDbCriteria;
		$criteria->condition ='user_id='.Yii::app()->user->getId();
		$criteria->addBetweenCondition('fecha',$fecha_min,$fecha_max); 
		$criteria->order='fecha';

        $agenda = Agenda::model()->findAll($criteria);
        foreach ($agenda as $key => $value) {
        	$semana[$value->fecha][] = $value;

        }
		  
		$this->render('index',array(
			'fechaMin'=>$fecha_min,
			'fechaMax'=>$fecha_max,
			'semana'=>$semana,
		));
	}

	public function actionSemana($fecha)
	{


		//$dataProvider=new CActiveDataProvider('Agenda');
		$hoy = date('N',strtotime($fecha));

		$offsetLunes = $hoy - 1;
		$offsetViernes = 5 - $hoy;
		
		if($offsetLunes == 0)
			$fecha_min = date('Y-m-d',strtotime($fecha));
		else
			$fecha_min = date('Y-m-d',strtotime('-'.$offsetLunes.' day'));

		if($hoy == 6)
			$fecha_max = date('Y-m-d',strtotime('-1 day'));
		if($hoy == 7)
			$fecha_max = date('Y-m-d',strtotime('-2 day'));
		if($offsetViernes == 0)
			$fecha_max = date('Y-m-d',strtotime($fecha));
		else
			$fecha_max = date('Y-m-d',strtotime('+'.$offsetViernes.' day'));

		$semana = array();
		for($i=0; $i<7; $i++){
			if ($i == 0)
				$semana[date('Y-m-d',strtotime($fecha_min))] = array();
			else
				$semana[date('Y-m-d',strtotime($i.' day',strtotime($fecha_min)))] = array();
		}

		$criteria = new CDbCriteria;
		$criteria->condition ='user_id='.Yii::app()->user->getId();
		$criteria->addBetweenCondition('fecha',$fecha_min,$fecha_max); 
		$criteria->order='fecha';

        $agenda = Agenda::model()->findAll($criteria);
        foreach ($agenda as $key => $value) {
        	$semana[$value->fecha][] = $value;

        }
		  
		$this->render('index',array(
			'fechaMin'=>$fecha_min,
			'fechaMax'=>$fecha_max,
			'semana'=>$semana,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Agenda('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Agenda'])) {
			$model->attributes=$_GET['Agenda'];
		}

		$this->render('admin',array(
			'fechaMin'=>$fecha_min,
			'fechaMax'=>$fecha_max,
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Agenda the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Agenda::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Agenda $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='agenda-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}