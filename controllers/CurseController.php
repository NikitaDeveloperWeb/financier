<?php

namespace app\controllers;

use app\models\AddCurse;
use app\models\AddLection;
use app\models\Curse;
use app\models\Lecture;
use app\models\SubscribesAdd;
use app\models\UpdateCurse;
use app\models\UpdateLection;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class CurseController extends Controller
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
  public function actionCurse()

  {
    return $this->render('curse');
  }

  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionCursestr($id)
  {
    $curse = Curse::findOne($id);
    return $this->render('cursestr', ['curse' => $curse]);
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionCurseadd()
  {
    $userData = Yii::$app->user->identity;
    $model = new AddCurse();
    $model->author = $userData['id'];
    if (isset($_POST['AddCurse'])) {
      $model->attributes = Yii::$app->request->post('AddCurse');
    }
    if ($model->validate() &&  $model->Add()) {
      return $this->redirect(['users/profile']);
    }
    return $this->render('curseadd', ['model' => $model]);
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
    return $this->redirect(['users/profile']);
  }

  /**
   * @return Curse the loaded model
   */
  private function findCurse($id)
  {
    return Curse::findOne($id);
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionCurseupdate($id)

  {
    $userData = Yii::$app->user->identity;
    $curse = $this->findCurse($id);
    $model = new UpdateCurse($curse);
    $model->author = $userData['id'];
    if ($model->load(Yii::$app->request->post()) && $model->update()) {
      return $this->redirect(['users/profile']);
    } else {
      return $this->render('curseupdate', [
        'model' => $model,
      ]);
    }
  }


  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionLection($id)
  {
    $lecture = Lecture::findOne($id);
    return $this->render('lection', ['lecture' => $lecture]);
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionLectionadd($idCurse)
  {
    $model = new AddLection();

    if (Yii::$app->request->isPost) {
      $model->curse = $idCurse;
      $model->load(Yii::$app->request->post());
      $model->image = UploadedFile::getInstance($model, 'image');
      if ($model->image = UploadedFile::getInstance($model, 'image')) {
        $model->image->saveAs("image/lection/{$model->image->baseName}.{$model->image->extension}");
        $model->Add();
        return $this->redirect(['users/profile ']);
      }
    }
    return $this->render('lectionadd', ['model' => $model]);
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionLectiondelete($id)
  {
    $model = Lecture::findOne($id);
    if ($model) {
      $model->delete();
    }
    return $this->redirect(['users/profile']);
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionLectionupdate($id, $idCurse)

  {
    $lection = Lecture::findOne($id);
    $model = new UpdateLection($lection);

    if (Yii::$app->request->isPost) {
      $model->curse = $idCurse;
      $model->load(Yii::$app->request->post());
      $model->image = UploadedFile::getInstance($model, 'image');
      if ($model->image = UploadedFile::getInstance($model, 'image')) {
        $model->image->saveAs("image/lection/{$model->image->baseName}.{$model->image->extension}");
        $model->update();
        return $this->redirect(['users/profile']);
      }
    }
    return $this->render('lectionupdate', ['model' => $model, 'idLection' => $id]);
  }
  // Subscribies 
  public function actionSubscribies($idUser, $idCurse)
  {
    $modelSub = new SubscribesAdd();
    $modelSub->id_curse = $idCurse;
    $modelSub->id_user = $idUser;
    if (isset($_POST['SubscribesAdd'])) {
      $modelSub->attributes = Yii::$app->request->post('SubscribesAdd');
    }
    if ($modelSub->validate() &&  $modelSub->subscribies()) {
      return $this->redirect('curse');
    }
    return $this->render('curse');
  }
  // unscribies
  public function actionUnsubscribies($idUser, $idCurse)
  {
    $subItem = Yii::$app->db->createCommand()
      ->delete('subscribes_curse', 'id_user = ' . $idUser . '  AND id_curse = ' . $idCurse);
    $subItem->execute();
    return $this->redirect(['users/profile']);
  }
}
