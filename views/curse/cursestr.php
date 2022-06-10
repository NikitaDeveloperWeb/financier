<?php

/** @var yii\web\View $this */

$this->title = 'Financier | курс';

use app\models\Lecture;
use app\models\User;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$userData = Yii::$app->user->identity;
?>
<? $author = User::findOne($curse['author']);  ?>
<span class="curse-top">
  <h1><?= $curse['title'] ?></h1>
  <h2>Автор: <?= $author['firstname'] . ' ' . $author['lastname'] ?></h2>
</span>
<p class="autor-gloss">
  <strong>Пояснения автора:</strong> <?= $curse['description'] ?>
</p>
<div class="curse-lection">
  <?
  $lectureAll = Lecture::find()->all();
  foreach ($lectureAll as $key => $lecture) {
    if ($lecture['curse'] === $curse['id']) {
      $id = $lecture['id'];
  ?>
      <div class="curse-lection__item">
        <h2><?= $lecture['title'] ?></h2>
        <p><?= $lecture['description'] ?></p>
        <a href=<?= Url::to(['curse/lection/', 'id' => $id]); ?>>Читать</a>
        <?php if ($userData['typeUser'] === 'UserT' && $userData['id'] === $author['id']) : ?>
          <a href="<?= Url::toRoute(['curse/lectionupdate', 'id' => $id, 'idCurse' => $curse['id']]); ?>" class="link-sub">Редактировать</a>
          <a href="<?= Url::toRoute(['curse/lectiondelete', 'id' => $id]); ?>" class="link-sub">Удалить</a>
        <? endif; ?>
      </div>
  <? }
  } ?>
</div>