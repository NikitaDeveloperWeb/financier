<?php

/** @var yii\web\View $this */

$this->title = 'Financier | профиль';

use app\models\Curse;
use app\models\Subscribes_curse;
use app\models\User;
use yii\helpers\Url;

$userData = Yii::$app->user->identity;
$typeUser = '';
if ($userData['typeUser'] === 'UserS') {
  $typeUser = 'Студент';
} else if ($userData['typeUser'] === 'Admin') {
  $typeUser = 'Администратор';
} else {
  $typeUser = 'Преподаватель';
}

?>
<h1>Мой профиль</h1>
<div class="profile">
  <span>
    <div class="profile__avatar"><?= mb_substr($userData['firstname'], 0, 1) ?></div>
    <a href=<?= Url::to(['users/edituser/']); ?>>Редактировать</a>
  </span>
  <div class="profile__data">
    <h2><?= $userData['lastname'] . ' ' . $userData['firstname'] . $userData['secondname'] . '(' . $userData['username'] . ')' ?></h2>
    <p><strong>Почта: </strong> <?= $userData['email'] ?></p>
    <p><strong>Номер: </strong> <?= $userData['phone'] ?></p>
    <p><strong>Статус:</strong> <?= $typeUser ?></p>
  </div>

</div>
<div class="list-curse">
  <?php if ($userData['typeUser'] === 'UserS') : ?>
    <h2>Мои подписки:</h2>
    <div class="curse-list">
      <?
      $subscribiesAll = Subscribes_curse::find()->all();
      foreach ($subscribiesAll as $item) {
        if ($item['id_user'] === $userData['id']) {
          $curse = Curse::findOne($item['id_curse']);
          $id = $item['id_curse'];
          $id_user = $userData['id'];
          $author = User::findOne($curse['author']);
      ?>

          <div class="curse-preview">
            <h2><?= $curse['title'] ?></h2>
            <p><strong>Автор: </strong><?= $author['firstname'] . ' ' . $author['lastname'] ?></p>
            <p><strong>Уровень: </strong> <?= $curse['level'] ?></p>
            <span>
              <a href=<?= Url::to(['curse/cursestr/', 'id' => $id]); ?>>Подробнее</a>
              <a href="<?= Url::toRoute(['curse/unsubscribies', 'idUser' => $id_user, 'idCurse' => $id]); ?>" class="link-sub">Отписаться</a>
            </span>
          </div>
      <? }
      } ?>
    </div>
  <?php endif; ?>
  <?php if ($userData['typeUser'] === 'UserT') : ?>
    <h2>Мои курсы:</h2>
    <a href="<?= Url::toRoute(['curse/curseadd']); ?>">Создать курс</a>
    <?
    $curseTeacher = Curse::find()->where(['author' => $userData['id']])->all();
    ?>
    <div class="curse-list">
      <?
      foreach ($curseTeacher as $item) {
        $id = $item['id'];
      ?>

        <div class="curse-preview">
          <h2><?= $item['title'] ?></h2>
          <p><strong>Уровень: </strong> <?= $item['level'] ?></p>
          <span>
            <a href=<?= Url::to(['curse/cursestr/', 'id' => $id]); ?>>Подробнее</a>
            <a href="<?= Url::toRoute(['curse/curseupdate', 'id' => $id]); ?>" class="link-sub">Редактировать </a>
            <a href="<?= Url::toRoute(['curse/cursedelete', 'id' => $id]); ?>" class="link-sub">Удалить </a>
            <a href="<?= Url::toRoute(['curse/lectionadd', 'idCurse' => $id]); ?>" class="link-sub">Добавить лекцию</a>
          </span>
        </div>

      <?
      } ?>
    </div>
</div>
<?php endif; ?>