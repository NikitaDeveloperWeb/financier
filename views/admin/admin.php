<?php

/** @var yii\web\View $this */

$this->title = 'Financier | административная панель';

use app\models\News;
use app\models\User;
use yii\bootstrap4\Html;
use yii\helpers\Url;

$userData = Yii::$app->user->identity;
?>
<h1>Новости</h1>
<a href=<?= Url::to(['admin/newsadd', 'idAuthor' => $userData['id']]); ?>>Добавить новость</a>
<table>
  <?
  $newsAll = News::find()->all();
  foreach ($newsAll as $key => $item) {
    $author = User::findOne($item['autor']);

  ?>
    <tr>
      <td><strong>ID:</strong><?= $item['id'] ?></td>
      <td><strong>Заголовок:</strong><?= $item['title'] ?></td>
      <td><strong>Подзаголовок:</strong><?= $item['subtitle'] ?></td>
      <td class="imgTable"><strong>Изображение:</strong><?= Html::img('@web/image/news/' . $item['image'] . '', ['alt' => 'Удалить', 'class' => 'icon', 'id' => 'arrow']); ?></td>
      <td><strong>Текст:</strong><?= $item['text'] ?></td>
      <td><strong>Автор:</strong><?= $author['firstname'] . ' ' . $author['lastname'] ?></td>
      <td><strong>Действия:</strong>
        <a href=<?= Url::to(['admin/newsdelete', 'id' => $item['id']]); ?>>Удалить</a>
        <a href=<?= Url::to(['admin/newsupdate', 'id' => $item['id']]); ?>>Редактировать</a>
      </td>
    </tr>
  <? } ?>
</table>