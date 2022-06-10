<?php

/** @var yii\web\View $this */

$this->title = 'Financier | административная панель';

use app\models\Curse;
use app\models\News;
use app\models\User;
use app\models\Words;
use yii\helpers\Url;
?>
<h1>Слова</h1>
<a href=<?= Url::to(['admin/wordadd']); ?>>Добавить слово</a>
<table>
  <?
  $wordsAll = Words::find()->all();
  foreach ($wordsAll as $key => $item) {
  ?>
    <tr>
      <td><strong>ID:</strong><?= $item['id'] ?></td>
      <td><strong>Слово:</strong><?= $item['word'] ?></td>
      <td><strong>Описание:</strong><?= $item['description'] ?></td>

      <td><strong>Действия:</strong>
        <a href=<?= Url::to(['admin/worddelete', 'id' => $item['id']]); ?>>Удалить</a>
        <a href=<?= Url::to(['admin/wordupdate', 'id' => $item['id']]); ?>>Редактировать</a>
      </td>
    </tr>
  <? } ?>
</table>