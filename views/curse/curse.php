<?php

/** @var yii\web\View $this */

$this->title = 'Financier | курсы';

use app\models\Curse;
use app\models\Subscibes_curse;
use app\models\Subscribes_curse;
use app\models\User;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<h1>Курсы</h1>
<p class="gloss-text">Подписанные курсы доступны в профиле.</p>
<div class="curse-list">
  <?
  $curseAll = Curse::find()->all();
  $subscribiesAll = Subscribes_curse::find()->all();
  $userData = Yii::$app->user->identity;
  $curseSub = [];
  $curseArray = [];

  if (count($subscribiesAll) > 0) {
    foreach ($subscribiesAll as $sub) {
      foreach ($curseAll as $curse) {
        if ($sub['id_user'] === $userData['id'] && $sub['id_curse'] === $curse['id']) {
          array_push($curseSub, $curse);
        }
      }
    }
  } else {
    $curseSub = $curseAll;
  }
  if (count($subscribiesAll) > 0) {

    foreach ($curseSub as $curSub) {
      array_push($curseArray, $curSub['id']);
    }
    foreach ($curseAll as $key => $item) {
      if (in_array($item['id'], $curseArray)) unset($curseAll[$key]);
    }
  }
  foreach ($curseAll as $item) {
    $id = $item['id'];
    $id_user = $userData['id'];
    $id_curse = $item['id'];
    $author = User::findOne($item['author']);
  ?>
    <div class="curse-preview">
      <h2><?= $item['title'] ?></h2>
      <p><strong>Автор: </strong> <?= $author['firstname'] . " " . $author['lastname'] ?></p>
      <p><strong>Уровень: </strong><?= $item['level'] ?></p>
      <span>
        <a href=<?= Url::to(['curse/cursestr/', 'id' => $id]); ?>>Подробнее</a>
        <?php if ($userData['typeUser'] === 'UserS') : ?>
          <a href="<?= Url::toRoute(['curse/subscribies', 'idUser' => $id_user, 'idCurse' => $id_curse]); ?> " class="link-sub">Подписаться</a>
        <?php endif; ?>
      </span>
    </div>
  <? } ?>
</div>