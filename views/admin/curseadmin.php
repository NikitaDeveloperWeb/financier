<?php

/** @var yii\web\View $this */

$this->title = 'Financier | административная панель';

use app\models\Curse;
use app\models\News;
use app\models\User;
use yii\helpers\Url;
?>
<h1>Курсы</h1>
<table>
  <?
  $curseAll = Curse::find()->all();
  foreach ($curseAll as $key => $item) {
    $author = User::findOne($item['author']);

  ?>
    <tr>
      <td><strong>ID:</strong><?= $item['id'] ?></td>
      <td><strong>Заголовок:</strong><?= $item['title'] ?></td>
      <td><strong>Описание:</strong><?= $item['description'] ?></td>
      <td><strong>Уровень:</strong><?= $item['level'] ?></td>
      <td><strong>Автор:</strong><?= $author['firstname'] . ' ' . $author['lastname'] ?></td>
      <td><strong>Действия:</strong>
        <a href=<?= Url::to(['admin/cursedelete', 'id' => $item['id']]); ?>>Удалить</a>
      </td>
    </tr>
  <? } ?>
</table>