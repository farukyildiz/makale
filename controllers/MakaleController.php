<?php

namespace backend\modules\blog\controllers;

use Yii;
use backend\modules\blog\models\Makale;
use backend\modules\blog\models\MakaleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * MakaleController implements the CRUD actions for Makale model.
 */
class MakaleController extends Controller
{
	public function behaviors()
    {
        return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['create','update','delete'],
				'rules' => [
					[
					'allow' => true,
					'roles' => ['@']
					],
				]
			],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
	
	//	public function behaviors()
	//	{
	//		$behaviors['access'] = [
	//			'class' => AccessControl::className(),
	//			'rules' => [
	//				[
	//						'allow' => true,
	//						'roles' => ['@'],
	//						'matchCallback' => function ($rule, $action) {
	//						
	//						$module                 = Yii::$app->controller->module->id; 
	//						$action                 = Yii::$app->controller->action->id;
	//						$controller         = Yii::$app->controller->id;
	//						$route                     = "$module/$controller/$action";
	//						$post = Yii::$app->request->post();
	//						if (\Yii::$app->user->can($route)) {
	//							return true;
	//						}
	//						}
	//				],
	//			],
	//		];         return $behaviors;    
	//	}
	//	
	//	public function actionCreate_rule()
	//	{
	//		$auth = Yii::$app->authManager;
    //
	//		// add the rule
	//		$rule = new \common\modules\auth\rbac\AuthorRule;
	//		$auth->add($rule);
	//		
	//		// add the "updateOwnPost" permission and associate the rule with it.
	//		$updateOwnPost = $auth->createPermission('updateOwnPost');
	//		$updateOwnPost->description = 'Update own post';
	//		$updateOwnPost->ruleName = $rule->name;
	//		$auth->add($updateOwnPost);
    //
	//		$updatePost = $auth->createPermission('blog/makale/update');
	//		// "updateOwnPost" will be used from "updatePost"
	//		$auth->addChild($updateOwnPost, $updatePost);
    //
	//		$author = $auth->createPermission('author');
	//		// allow "author" to update their own posts
	//		$auth->addChild($author, $updateOwnPost);
	//	}
    //
    //
	//	public function actionAssigment()
	//	{
	//		$auth = Yii::$app->authManager;
	//		$author = $auth->createRole('author');
	//		$admin = $auth->createRole('admin');
	//		$auth->assign($author, 2);
	//		$auth->assign($admin, 1);
	//	}
    //
	//	public function actionCreate_role()
	//	{
	//		$auth = Yii::$app->authManager;
    //
    //       $index = $auth->createPermission('blog/makale/index');
    //  
	//		// add "updatePost" permission
	//		$create = $auth->createPermission('blog/makale/create');
    //  
	//		$view = $auth->createPermission('blog/makale/view');
	//		$update = $auth->createPermission('blog/makale/update');
    // 
	//		$delete = $auth->createPermission('blog/makale/delete');
    //  
	//		$null = $auth->createPermission('site/index');
	//		$yetki = $auth->createPermission('blog/auth');
    //  
    //  
	//		// add "author" role and give this role the "createPost" permission
	//		$author = $auth->createRole('author');
	//		$auth->add($author);
	//		$auth->addChild($author, $index);
	//		$auth->addChild($author, $create);
	//		$auth->addChild($author, $view);
	//		$auth->addChild($author, $null);
    //  
    //    
	//		// add "admin" role and give this role the "updatePost" permission
	//		// as well as the permissions of the "author" role
	//		$admin = $auth->createRole('admin');
	//		$auth->add($admin);
	//		$auth->addChild($admin, $author);
	//		$auth->addChild($admin, $update);
	//		$auth->addChild($admin, $delete);
    //       $auth->addChild($admin, $yetki);    
	//	}
    //
    //    public function actionCreate_permission()
    //    {
	//		$auth = Yii::$app->authManager;
	//
	//		// add "createPost" permission
	//		$index = $auth->createPermission('blog/makale/index');
	//		$index->description = 'create a index';
	//		$auth->add($index);
	//
	//		// add "updatePost" permission
	//		$create = $auth->createPermission('blog/makale/create');
	//		$create->description = 'Create post';
	//		$auth->add($create);
	//
	//		$view = $auth->createPermission('blog/makale/view');
	//		$view->description = ' view post';
	//		$auth->add($view);
	//
	//		$update = $auth->createPermission('blog/makale/update');
	//		$update->description = ' update post';
	//		$auth->add($update);
	//
	//		$delete = $auth->createPermission('blog/makale/delete');
	//		$delete->description = ' delete post';
	//		$auth->add($delete);
	//
	//		$null = $auth->createPermission('site/index');
	//		$null->description = ' null';
	//		$auth->add($null);
	//
	//		$yetki = $auth->createPermission('blog/auth');
	//		$yetki->description = ' authoruzation';
	//		$auth->add($yetki);
    //
    //    }

		/**
		* Lists all Makale models.
		* @return mixed
		*/
		public function actionIndex()
		{
			$searchModel = new MakaleSearch();
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
	
			return $this->render('index', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
			]);
		}
	
		/**
		* Displays a single Makale model.
		* @param integer $id
		* @return mixed
		*/
		public function actionView($id)
		{
			return $this->render('view', [
				'model' => $this->findModel($id),
			]);
		}
		
		public function actionMakaleview()
{	
		$model = new Makale();
	
		if ($model->load(Yii::$app->request->post())) {
			if ($model->validate()) {
				// form inputs are valid, do something here
				return;
			}
		}
	
		return $this->render('makaleview', [
			'model' => $model,
		]);
}	
	
		/**
		* Creates a new Makale model.
		* If creation is successful, the browser will be redirected to the 'view' page.
		* @return mixed
		*/
		public function actionCreate()
		{
			$model = new Makale();
	
			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->ID]);
			} else {
				return $this->render('create', [
					'model' => $model,
				]);
			}
		}
	
		/**
		* Updates an existing Makale model.
		* If update is successful, the browser will be redirected to the 'view' page.
		* @param integer $id
		* @return mixed
		*/
		public function actionUpdate($id)
		{
			$model = $this->findModel($id);
	
			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->ID]);
			} else {
				return $this->render('update', [
					'model' => $model,
				]);
			}
		}
	
		/**
		* Deletes an existing Makale model.
		* If deletion is successful, the browser will be redirected to the 'index' page.
		* @param integer $id
		* @return mixed
		*/
		public function actionDelete($id)
		{
			$this->findModel($id)->delete();
	
			return $this->redirect(['index']);
		}
	
		/**
		* Finds the Makale model based on its primary key value.
		* If the model is not found, a 404 HTTP exception will be thrown.
		* @param integer $id
		* @return Makale the loaded model
		* @throws NotFoundHttpException if the model cannot be found
		*/
		protected function findModel($id)
		{
			if (($model = Makale::findOne($id)) !== null) {
				return $model;
			} else {
				throw new NotFoundHttpException('The requested page does not exist.');
			}
		}
}
