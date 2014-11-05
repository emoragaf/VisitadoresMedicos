<?php

class VisitaController extends Controller
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$this->layout='//layouts/column1';
		$user_id =Yii::app()->user->getId();
		$model=new Visita;
		$recordatorio = new Recordatorio;
		$model->visitador_id = Yii::app()->user->getId();
		$model->organizacion_id = $id;
		$model->created_at = date('c');
		$p = PersonaOrganizacion::model()->findAll(array("condition"=>"organizacion_id =  $model->organizacion_id"));
		$personas = array();
		/*$visitas=new CActiveDataProvider('Visita', array(
		            'criteria'=>array(
		                'condition'=>'t.organizacion_id=:id',
		                'order'=>'fecha_programada',
		                'params'=>array(':id'=>$model->organizacion_id),
		            ),
		));
		$visitas->pagination->pageSize=5;*/
		$visitas = Visita::model()->findAll(array("condition"=>"organizacion_id =  $model->organizacion_id",'order'=>'fecha_programada DESC'));
		$recordatorios = Recordatorio::model()->findAll(array("condition"=>"organizacion_id = ".$model->organizacion_id." AND autor_id = ".$user_id,'order'=>'importancia DESC,fecha_recordatorio DESC'));

		foreach ($p as $value) {
			//print_r($value);
			$foo = Persona::model()->findByPk($value->persona_id);
			$personas[$foo->id] = $foo->nombre.' '.$foo->apellido_p;
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Visita'])) {
			$model->attributes=$_POST['Visita'];

			$persona_org = PersonaOrganizacion::model()->find(array("condition"=>"organizacion_id =  $model->organizacion_id AND persona_id = $model->visitado_id"));
			if($persona_org)
				$model->cargo_visitado = $persona_org->cargo;
			
			$model->updated_at = date('c');
			$markdown = new CMarkdown;
				$model->notas = $markdown->transform($model->notas);
			if(!empty($model->fecha_realizada)){
				$model->fecha_realizada = date('Y-m-d');
			}
			if( $_POST['Visita']['fecha_programada'] != '')
				$model->fecha_programada = date('Y-m-d',strtotime($model->fecha_programada));
			else
				$model->fecha_programada = null;

			if(isset($_POST['Recordatorio']) && isset($_POST['recordatorio']) && $_POST['recordatorio'] == 1){
				$recordatorio->attributes=$_POST['Recordatorio'];
				$recordatorio->persona_organizacion = $model->visitado_id;
				$recordatorio->organizacion_id = $model->organizacion_id;
				$recordatorio->autor_id = Yii::app()->user->getId();
				$recordatorio->destinatario_id = Yii::app()->user->getId();
				$recordatorio->fecha_creacion = date('Y-m-d H:i');
				$recordatorio->texto = $model->notas;
				if( $_POST['Recordatorio']['fecha_recordatorio'] != '')
					$recordatorio->fecha_recordatorio = date('c',strtotime($recordatorio->fecha_recordatorio));
				else
					$recordatorio->fecha_recordatorio = date('c');

				if ($model->save() && $recordatorio->save()) {
					$recordatorio->visita_id = $model->id;
					$recordatorio->save();
					$this->redirect(array('/Organizacion/view','id'=>$model->organizacion_id));
				}
			}
			else if(!isset($_POST['recordatorio']) && $_POST['Recordatorio']['texto'] != ''){
				$recordatorio->attributes=$_POST['Recordatorio'];
				$recordatorio->persona_organizacion = $model->visitado_id;
				$recordatorio->organizacion_id = $model->organizacion_id;
				$recordatorio->autor_id = Yii::app()->user->getId();
				$recordatorio->texto = $recordatorio->texto;
				$recordatorio->destinatario_id = Yii::app()->user->getId();
				$recordatorio->fecha_creacion = date('Y-m-d H:i');
				if( $_POST['Recordatorio']['fecha_recordatorio'] != '')
					$recordatorio->fecha_recordatorio = date('c',strtotime($recordatorio->fecha_recordatorio));
				else
					$recordatorio->fecha_recordatorio = date('c');

				if ($model->save() && $recordatorio->save()) {
					$recordatorio->visita_id = $model->id;
					$recordatorio->save();
					$this->redirect(array('/Organizacion/view','id'=>$model->organizacion_id));
				}
			}

			else if($model->save()){
				$this->redirect(array('/Organizacion/view','id'=>$model->organizacion_id));
			}

			
		}

		//print_r($personas);
		$this->render('create',array(
			'model'=>$model,
			'recordatorios'=>$recordatorios,
			'recordatorio'=>$recordatorio,
			'visitados'=>$personas,
			'visitas'=>$visitas,
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
		$model->notas = strip_tags($model->notas);

		$this->layout='//layouts/column1';
		$user_id =Yii::app()->user->getId();
		if($model->recordatorio){
			$recordatorio = $model->recordatorio;
			$recordatorio->texto = strip_tags($recordatorio->texto);
		}
		else
		{
			$recordatorio = new Recordatorio;
			$recordatorio->fecha_creacion = date('Y-m-d H:i');	
		}
		$markdown = new CMarkdown;
		$p = PersonaOrganizacion::model()->findAll(array("condition"=>"organizacion_id =  $model->organizacion_id"));
		$personas = array();
		/*$visitas=new CActiveDataProvider('Visita', array(
		            'criteria'=>array(
		                'condition'=>'t.organizacion_id=:id',
		                'order'=>'fecha_programada',
		                'params'=>array(':id'=>$model->organizacion_id),
		            ),
		));
		$visitas->pagination->pageSize=5;*/
		$visitas = Visita::model()->findAll(array("condition"=>"organizacion_id =  $model->organizacion_id",'order'=>'fecha_programada DESC'));
		$recordatorios = Recordatorio::model()->findAll(array("condition"=>"organizacion_id = ".$model->organizacion_id." AND autor_id = ".$user_id,'order'=>'importancia DESC,fecha_recordatorio DESC'));

		foreach ($p as $value) {
			//print_r($value);
			$foo = Persona::model()->findByPk($value->persona_id);
			$personas[$foo->id] = $foo->nombre.' '.$foo->apellido_p;
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Visita'])) {
			$model->attributes=$_POST['Visita'];

			$persona_org = PersonaOrganizacion::model()->find(array("condition"=>"organizacion_id =  $model->organizacion_id AND persona_id = $model->visitado_id"));
			if($persona_org)
				$model->cargo_visitado = $persona_org->cargo;
			
			$model->updated_at = date('c');
			$markdown = new CMarkdown;
				$model->notas = $markdown->transform($model->notas);
			if(!empty($model->fecha_realizada)){
				$model->fecha_realizada = date('Y-m-d');
			}
			if( $_POST['Visita']['fecha_programada'] != '')
				$model->fecha_programada = date('Y-m-d',strtotime($model->fecha_programada));
			else
				$model->fecha_programada = null;

			if(isset($_POST['Recordatorio']) && isset($_POST['recordatorio']) && $_POST['recordatorio'] == 1){
				$recordatorio->attributes=$_POST['Recordatorio'];
				$recordatorio->persona_organizacion = $model->visitado_id;
				$recordatorio->organizacion_id = $model->organizacion_id;
				$recordatorio->autor_id = Yii::app()->user->getId();
				$recordatorio->destinatario_id = Yii::app()->user->getId();
				$recordatorio->texto = $model->notas;
				if( $_POST['Recordatorio']['fecha_recordatorio'] != '')
					$recordatorio->fecha_recordatorio = date('Y-m-d H:i',strtotime($recordatorio->fecha_recordatorio));
				else
					$recordatorio->fecha_recordatorio = null;

				if ($model->save() && $recordatorio->save()) {
					$recordatorio->visita_id = $model->id;
					$recordatorio->save();

					$this->redirect(array('/Organizacion/view','id'=>$model->organizacion_id));
				}
			}
			else if(!isset($_POST['recordatorio']) && $_POST['Recordatorio']['texto'] != ''){
				$recordatorio->attributes=$_POST['Recordatorio'];
				$recordatorio->persona_organizacion = $model->visitado_id;
				$recordatorio->organizacion_id = $model->organizacion_id;
				$recordatorio->autor_id = Yii::app()->user->getId();
				$recordatorio->texto = $recordatorio->texto;
				$recordatorio->destinatario_id = Yii::app()->user->getId();
				
				if( $_POST['Recordatorio']['fecha_recordatorio'] != '')
					$recordatorio->fecha_recordatorio = date('Y-m-d H:i',strtotime($recordatorio->fecha_recordatorio));
				else
					$recordatorio->fecha_recordatorio = null;

				if ($model->save() && $recordatorio->save()) {
					$recordatorio->visita_id = $model->id;
					$recordatorio->save();

					$this->redirect(array('/Organizacion/view','id'=>$model->organizacion_id));
				}
			}

			else if($model->save()){
				$this->redirect(array('/Organizacion/view','id'=>$model->organizacion_id));
			}

			
		}

		//print_r($personas);
		$this->render('update',array(
			'model'=>$model,
			'recordatorios'=>$recordatorios,
			'recordatorio'=>$recordatorio,
			'visitados'=>$personas,
			'visitas'=>$visitas,
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
		$dataProvider=new CActiveDataProvider('Visita');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Visita('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Visita'])) {
			$model->attributes=$_GET['Visita'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Visita the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Visita::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Visita $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='visita-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}