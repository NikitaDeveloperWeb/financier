<?php

/** @var yii\web\View $this */

$this->title = 'Financier | лекция';

use yii\bootstrap4\Html;
use app\models\Mission;
use yii\helpers\Url;
?>
<h1><?= $lecture['title'] ?></h1>
<div class="news-full">
  <?= Html::img('@web/image/lection/' . $lecture['image'] . '', ['alt' => 'Удалить', 'class' => 'icon', 'id' => 'arrow']); ?>
  <p><?= $lecture['text'] ?>
  </p>
  <button onclick="window.history.back()" class="button-back">Назад</button>

  <div class="lection_quest">
    <h2>Список заданий</h2>
    <ol type="A">
      <?
      $missionAll = Mission::find()->all();

      foreach ($missionAll as $key => $miss) {
        if ($miss['lecture'] === $lecture['id']) {
      ?>
          <li><?= $miss['text'] ?></li>
      <?
        }
      } ?>
    </ol>
  </div>
</div>