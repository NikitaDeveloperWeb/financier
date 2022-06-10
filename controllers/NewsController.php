<?php

namespace app\controllers;

use app\models\AddComments;
use app\models\News;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


class NewsController extends Controller
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
  public function actionNews($id)
  {
    $news = News::findOne($id);
    // return $this->render('news', ['news' => $news]);

    $userData = Yii::$app->user->identity;
    $model = new AddComments();
    $model->author = $userData['id'];
    $model->news = $id;
    $model->date = date("m.d.y");
    if (isset($_POST['AddComments'])) {
      $model->attributes = Yii::$app->request->post('AddComments');
    }
    if ($model->validate() &&  $model->Add()) {
      return $this->redirect(['news', 'id' => $id]);
    }
    return $this->render('news', ['model' => $model, 'news' => $news]);
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionDeletenews($id)
  {
    $model = News::findOne($id);
    if ($model) {
      $model->delete();
    }
    return $this->redirect(['site/admin']);
  }
}
