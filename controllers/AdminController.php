<?php

namespace app\controllers;

use app\models\AddNews;
use app\models\AddWord;
use app\models\Curse;
use app\models\News;
use app\models\UpdateNews;
use app\models\UpdateWords;
use app\models\User;
use app\models\Words;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class AdminController extends Controller
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
  public function actionAdmin()

  {
    $this->layout = 'adminLayout';
    return $this->render('admin');
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionNewsadd($idAuthor)
  {
    $this->layout = 'adminLayout';
    $model = new AddNews();

    if (Yii::$app->request->isPost) {
      $model->autor = $idAuthor;
      $model->date = date("m.d.y");
      $model->load(Yii::$app->request->post());
      $model->image = UploadedFile::getInstance($model, 'image');
      if ($model->image = UploadedFile::getInstance($model, 'image')) {
        $model->image->saveAs("image/news/{$model->image->baseName}.{$model->image->extension}");
        $model->Add();
        return $this->redirect(['admin/admin ']);
      }
    }
    return $this->render('newsadd', ['model' => $model]);
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionNewsupdate($id)

  {
    $this->layout = 'adminLayout';
    $news = News::findOne($id);
    $model = new UpdateNews($news);
    $userData = Yii::$app->user->identity;
    if (Yii::$app->request->isPost) {
      $model->autor = $userData['id'];

      $model->load(Yii::$app->request->post());
      $model->image = UploadedFile::getInstance($model, 'image');
      if ($model->image = UploadedFile::getInstance($model, 'image')) {
        $model->image->saveAs("image/news/{$model->image->baseName}.{$model->image->extension}");
        $model->update();
        return $this->redirect(['admin/admin']);
      }
    }
    return $this->render('newsupdate', ['model' => $model, 'idNews' => $id]);
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionNewsdelete($id)
  {
    $this->layout = 'adminLayout';
    $model = News::findOne($id);
    if ($model) {
      $model->delete();
    }
    return $this->redirect(['admin/admin']);
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionCurseadmin()
  {
    $this->layout = 'adminLayout';
    return $this->render('curseadmin');
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionCursedelete($id)
  {
    $model = Curse::findOne($id);
    if ($model) {
      $model->delete();
    }
    return $this->redirect(['admin/curseadmin']);
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionUsersadmin()
  {
    $this->layout = 'adminLayout';
    return $this->render('usersadmin');
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionUserst($id)
  {
    $this->layout = 'adminLayout';
    $user = User::findOne($id);
    if ($user) {
      Yii::$app->db->createCommand()
        ->update('user', ['typeUser' => 'UserT'], 'id =' . $id)
        ->execute();
      $this->redirect(['admin/usersadmin']);
    }
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionUserss($id)
  {
    $this->layout = 'adminLayout';
    $user = User::findOne($id);
    if ($user) {
      Yii::$app->db->createCommand()
        ->update('user', ['typeUser' => 'UserS'], 'id =' . $id)
        ->execute();
      $this->redirect(['admin/usersadmin']);
    }
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionWordsadmin()
  {
    $this->layout = 'adminLayout';
    return $this->render('wordsadmin');
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionWordadd()
  {
    $this->layout = 'adminLayout';
    $model = new AddWord();
    if (isset($_POST['AddWord'])) {
      $model->attributes = Yii::$app->request->post('AddWord');
    }
    if ($model->validate() &&  $model->Add()) {
      return $this->redirect(['admin/wordsadmin']);
    }
    return $this->render('wordadd', ['model' => $model]);
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionWordupdate($id)

  {
    $this->layout = 'adminLayout';
    $word = Words::findOne($id);
    $model = new UpdateWords($word);
    if ($model->load(Yii::$app->request->post()) && $model->update()) {
      return $this->redirect(['admin/wordsadmin']);
    } else {
      return $this->render('wordupdate', [
        'model' => $model,
      ]);
    }
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionWorddelete($id)
  {
    $model = Words::findOne($id);
    if ($model) {
      $model->delete();
    }
    return $this->redirect(['admin/wordsadmin']);
  }
}
