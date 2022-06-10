<?php

namespace app\controllers;

use app\models\UpdateUser;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


class UsersController extends Controller
{
  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'only' => ['logout'],
        'rules' => [
          [
            'actions' => ['logout'],
            'allow' => true,
            'roles' => ['@'],
          ],
        ],
      ],
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'logout' => ['post'],
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function actions()
  {
    return [
      'error' => [
        'class' => 'yii\web\ErrorAction',
      ],
      'captcha' => [
        'class' => 'yii\captcha\CaptchaAction',
        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
      ],
    ];
  }

  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionProfile()

  {
    return $this->render('profile');
  }
  /**
   * @return User the loaded model
   */
  private function findUser()
  {
    return User::findOne(Yii::$app->user->identity->getId());
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionEdituser()

  {
    $user = $this->findUser();
    $model = new UpdateUser($user);

    if ($model->load(Yii::$app->request->post()) && $model->update()) {
      return $this->redirect(['users/profile']);
    } else {
      return $this->render('edituser', [
        'model' => $model,
      ]);
    }
  }



  /**
   * Logout action.
   *
   * @return Response
   */
  public function actionLogout()
  {
    Yii::$app->user->logout();
    setcookie("Auth", "");
    return $this->redirect(['/site/index']);
  }
}
