<?php

/** @var yii\web\View $this */

$this->title = 'Financier | рабочий стол';

use app\models\News;
use yii\bootstrap4\Html as Bootstrap4Html;
use yii\helpers\Url;
?>
<h1>Новости</h1>
<ul>
  <?php
  $newsAll = News::find()->all();

  foreach ($newsAll as $post) {
    $id = $post['id'];
  ?>

    <li class="news-preview">
      <span>
        <h2><?= $post['title'] ?></h2>
        <p><?= $post['date'] ?></p>
      </span>
      <p><?= $post['subtitle'] ?></p>
      <a href=<?= Url::to(['news/news/', 'id' => $id]); ?>>Читать далее...</a>
      <?= Bootstrap4Html::img('@web/image/news/' . $post['image'] . '', ['alt' => 'Удалить', 'class' => 'icon', 'id' => 'arrow']); ?>

    </li>
  <? } ?>
</ul>