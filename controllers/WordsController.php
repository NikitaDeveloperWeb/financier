<?php

namespace app\controllers;

use app\models\Words;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


class WordsController extends Controller
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
  public function actionWords()
  {
    return $this->render('words');
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionSearch($word)
  {
    $words = Words::find()->where(['word' => $word])->one();
    if (isset($words)) {
      return $this->render('search', ['words' => $words]);
    } else {
      return $this->render('words');
    }
  }
}
