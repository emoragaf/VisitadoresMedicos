<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	//public $layout='//layouts/column2';
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function filters() {
     return array( 
        //it's important to add site/error, so an unpermitted user will get the error.
        array('auth.filters.AuthFilter - user/login user/logout site/error'),
            );
        }

	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','loadData','loadData2'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionloadData(){
		ini_set('auto_detect_line_endings',true);
		set_time_limit(0);
		$path = Yii::getPathOfAlias('webroot').'/uploads/farmacos.txt';
		$file = fopen($path, "r");
		
		while (!feof($file)) {
			$line = fgets($file); //lo guarda en la linea
			$data = explode(';', $line);
			print_r($data);
			$ct = ClaseTerapeutica::model()->find(array('condition'=>'nombre = "'.$data[0].'"'));
			echo 'Buscando '.$data[0];
			echo '<br>';
			if($ct){
				echo 'Encontrado '.$data[0];
				echo '<br>';
				echo '<br>';
				$f = new Farmaco;
				$f->nombre = $data[1];
				$f->clase_terapeutica_id = $ct->id;
				$f->presentacion = $data[2].' '.$data[3];
				$f->save();
				
			}
		}
		fclose($file);
		echo 'Finalizada Carga';
	}

	public function actionloadData2(){
		set_time_limit(0);
		$path = Yii::getPathOfAlias('webroot').'/uploads/clases_terapeuticas.txt';
		$file = fopen($path, "r");
		
		while (!feof($file)) {
			$line = fgets($file); //lo guarda en la linea
			//$data = explode(';', $line);
			$line = str_replace("\n", '', $line); // remove new lines
			$line = str_replace("\r", '', $line); // remove 
			$ct = new ClaseTerapeutica;	
			$ct->nombre = $line;
			$ct->save();
		}
		echo 'Finalizada Carga';
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$user_id = Yii::app()->user->getId();
		$fecha_max = date('y-m-d',strtotime('+ 10 day'));
		$recordatorios=new CActiveDataProvider('Recordatorio', array(
		            'criteria'=>array(
		                'condition'=>'t.destinatario_id=:id AND leido = 0 AND fecha_recordatorio < :fecha_max OR (t.destinatario_id=:id AND importancia = 1 AND leido = 0)',
		                'order'=>'importancia DESC, fecha_recordatorio',
		                'params'=>array(':id'=>$user_id,':fecha_max'=>$fecha_max),
		            ),
		            'pagination'=>array(
                        'pageSize'=>4,
                    ),
		));
		//$dependency = new CDbCacheDependency('SELECT MAX(id) FROM organizacion');
		//$orgs = Organizacion::model()->cache(43200, $dependency)->findAll(array('order'=>'categoria_id desc'));
		$orgs = Organizacion::model()->findAll(array('order'=>'categoria_id desc'));
		$organizaciones = array();
		if(!empty($orgs)){
			foreach ($orgs as $org) {
				$organizaciones[] = array('label' => $org->nombre.' ('.$org->categoria->nombre.')', 'url' => array('/Organizacion/view','id'=>$org->id));
			}
		}
		$this->render('index',array('organizaciones'=>$organizaciones,'recordatorios'=>$recordatorios));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionAdmin()
	{
		$this->render('admin');
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}