<?php

/** @var yii\web\View $this */

$this->title = 'Financier | главная';

use yii\widgets\ActiveForm;
use yii\helpers\Url;

$userData = Yii::$app->user->identity;
?>

<body>
  <div class="wrapper">
    <div class="wrapper__mainPage">
      <div class="left">
        <a href="<?= Url::to(['site/index']); ?>" class="logo">
          <h1>F</h1>
          inancier
        </a>
        <p>онлайн портал для бизнес-ориентирующего обучения.</p>
      </div>
      <div class="rigth">
        <?php if ($userData) : ?>
          <a href=<?= Url::to(['site/dashbord']); ?>>Рабочий стол</a>
        <? endif ?>
        <?php if (!$userData) : ?>
          <a href=<?= Url::to(['site/auth']); ?>>Авторизоваться</a>
        <? endif ?>
      </div>
    </div>
  </div>

</body>

</html>