<?php

class FarmacoController extends Controller
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
				'actions'=>array('create','update','Adjunto','Upload'),
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
		$model = $this->loadModel($id);
		$uploads = $model->uploads;

		$this->render('view',array(
			'uploads'=>$uploads,
			'model'=>$model,
		));
	}

	public function actionUpload($id){
		$model= $this->loadModel($id);

		if (isset($_POST['Upload'])) {	
			$Docs = CUploadedFile::getInstancesByName('Documento');

			if (isset($Docs) && count($Docs) > 0) {
	            // go through each uploaded image
	            foreach ($Docs as $d => $doc) {
	            	if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads/')) {
				   		mkdir(Yii::getPathOfAlias('webroot').'/uploads/');
			   			chmod(Yii::getPathOfAlias('webroot').'/uploads/', 0775); 
			   		}
		   			if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads/farmacos/')) {
		   				mkdir(Yii::getPathOfAlias('webroot').'/uploads/farmacos/');
		   				chmod(Yii::getPathOfAlias('webroot').'/uploads/farmacos/', 0775);
		   			}
   					if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads/farmacos/'.$id.'/')) {
		   				mkdir(Yii::getPathOfAlias('webroot').'/uploads/farmacos/'.$id.'/');
		   				chmod(Yii::getPathOfAlias('webroot').'/uploads/farmacos/'.$id.'/', 0775);
		   			} 
						   
                    $farmacoUpload = new FarmacoUpload;
                    $upload = new Uploads;
					$upload->descripcion = $_POST['Descripcion'];
					$upload->fecha_creacion = date('c');
                    $upload->nombre = $doc->name; //it might be $img_add->name for you, filename is just what I chose to call it in my model
                    $upload->path = '/uploads/farmacos/'.$id.'/';
                    $upload->extension = $doc->extensionName;
                    if($upload->save()){
                    	$farmacoUpload->farmaco_id = $id;
                    	$farmacoUpload->upload_id = $upload->id;
                    	$farmacoUpload->save();
	                	$doc->saveAs($upload->path.$upload->id.'.'.$upload->extension);
	                	$this->redirect(array('view','id'=>$model->id));
                    }
                    else{
                		print_r($upload->errors);
                    }
		        }
		    }
		}
		$this->render('upload',array(
			'model'=>$model,
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Farmaco;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Farmaco'])) {
			$model->attributes=$_POST['Farmaco'];
			if ($model->save()) {
				$this->redirect(array('admin'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

		public function actionAdjunto($id)
	{
		$upload = Uploads::model()->findByPk($id);
		if($upload){
				$path = Yii::getPathOfAlias('webroot').$upload->path.$upload->id.'.'.$upload->extension;
				$filename = $upload->nombre.'.'.$upload->extension;
				if(file_exists($path)) {
                    /*$filecontent=file_get_contents($path);
					header("Content-Type: text/plain");
					header("Content-disposition: attachment; filename=$filename");
					header("Pragma: no-cache");
					echo $filecontent;*/

					return Yii::app()->getRequest()->sendFile($filename, @file_get_contents($path));

					//$this->redirect(array('admin'));
                } else {
                        header("HTTP/1.0 404 Not Found");
                        exit;
                }
		}
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

		if (isset($_POST['Farmaco'])) {
			$model->attributes=$_POST['Farmaco'];
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
		$dataProvider=new CActiveDataProvider('Farmaco');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Farmaco('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Farmaco'])) {
			$model->attributes=$_GET['Farmaco'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Farmaco the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Farmaco::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Farmaco $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='farmaco-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}