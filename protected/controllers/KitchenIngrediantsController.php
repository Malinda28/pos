<?php
	
	class KitchenIngrediantsController extends Controller
	{
		/**
			* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
			* using two-column layout. See 'protected/views/layouts/column2.php'.
		*/
		//public $layout='//layouts/column2';
		
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
		public function actionIndex()
		{
			$model=new KitchenIngrediants;
			$searchmodel=new KitchenIngrediants('search');
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);
			$action = 'Create';
			
			if(isset($_POST['KitchenIngrediants']))
			{
				$model->attributes=$_POST['KitchenIngrediants'];
				if($model->save()){
					Yii::app()->user->setFlash('success', "<script>
													window.onload = function gos()
													{
														document.getElementById('message-title').innerHTML= 'Success' ;
														document.getElementById('message-body').innerHTML= 'Successfully added !!' ;
														$('#myModal').modal('show');
													
													}</script>");
					
				$this->redirect(array('index'));}
			}
			
			$this->render('index',array(
			'model'=>$model,'searchmodel'=>$searchmodel,'action'=>$action
			));
		}
		
		/**
			* Updates a particular model.
			* If update is successful, the browser will be redirected to the 'view' page.
			* @param integer $id the ID of the model to be updated
		*/
		public function actionUpdate($id)
		{
			
			//$model=new KitchenIngrediants;
			$searchmodel=new KitchenIngrediants('search');
			$model=$this->loadModel($id);
			
			// Uncomment the following line if AJAX validation is needed
			//$this->performAjaxValidation($model);
			$action = 'Update';
			
			
			if(isset($_POST['KitchenIngrediants']))
			{
				$model->attributes=$_POST['KitchenIngrediants'];
				if($model->save()){
					Yii::app()->user->setFlash('success', "<script>
													window.onload = function gos()
													{
														document.getElementById('message-title').innerHTML= 'Success' ;
														document.getElementById('message-body').innerHTML= 'Successfully updated !!' ;
														$('#myModal').modal('show');
													
													}</script>");
				$this->redirect(array('index'));}
			}
			if(isset($_GET['KitchenIngrediants']))
			$model->attributes=$_GET['KitchenIngrediants'];
			
			
			$this->render('index',array(
			'model'=>$model,'searchmodel'=>$searchmodel,'action'=>$action
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
			public function actionIndexold()
			{
			$dataProvider=new CActiveDataProvider('KitchenIngrediants');
			$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
			}
			
			/**
			* Manages all models.
			*/
			public function actionAdmin()
			{
			$model=new KitchenIngrediants('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['KitchenIngrediants']))
			$model->attributes=$_GET['KitchenIngrediants'];
			
			$this->render('admin',array(
			'model'=>$model,
			));
			}
			
			/**
			* Returns the data model based on the primary key given in the GET variable.
			* If the data model is not found, an HTTP exception will be raised.
			* @param integer $id the ID of the model to be loaded
			* @return KitchenIngrediants the loaded model
			* @throws CHttpException
			*/
			public function loadModel($id)
			{
			$model=KitchenIngrediants::model()->findByPk($id);
			if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
			return $model;
			}
			
			/**
			* Performs the AJAX validation.
			* @param KitchenIngrediants $model the model to be validated
			*/
			protected function performAjaxValidation($model)
			{
			if(isset($_POST['ajax']) && $_POST['ajax']==='kitchen-ingrediants-form')
			{
			echo CActiveForm::validate($model);
			Yii::app()->end();
			}
			}
			}
						