<?php

/** @var yii\web\View $this */

$this->title = 'Financier | административная панель';


use app\models\User;
use yii\helpers\Url;
?>
<h1>Пользователи</h1>
<table>
  <?
  $userAll = User::find()->all();
  foreach ($userAll as $key => $item) {
    if ($item['typeUser'] !== 'Admin') {
  ?>
      <tr>
        <td><strong>ID:</strong><?= $item['id'] ?></td>
        <td><strong>Имя:</strong><?= $item['firstname'] ?></td>
        <td><strong>Фамилия:</strong><?= $item['lastname'] ?></td>
        <td><strong>Отчество:</strong><?= $item['secondname'] ?></td>
        <td><strong>Телефон:</strong><?= $item['phone'] ?></td>
        <td><strong>Почта:</strong><?= $item['email'] ?></td>
        <td><strong>Имя пользователя:</strong><?= $item['username'] ?></td>
        <td><strong>Тип:</strong><?= $item['typeUser'] ?></td>
        <td><strong>Действия:</strong>
          <a href=<?= Url::to(['admin/newsAdd']); ?>>Удалить</a>
          <?php if ($item['typeUser'] === 'UserT') : ?>
            <a href=<?= Url::to(['admin/userss', 'id' => $item['id']]); ?>>Сделать студентом</a>
          <?php endif; ?>
          <?php if ($item['typeUser'] === 'UserS') : ?>
            <a href=<?= Url::to(['admin/userst', 'id' => $item['id']]); ?>>Сделать преподавателем</a>
          <?php endif; ?>
        </td>
      </tr>
  <? }
  } ?>
</table>