<?php

/** @var yii\web\View $this */

$this->title = 'Financier | новость';

use app\models\Comments;
use app\models\User;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;
?>

<h1><?= $news['title'] ?></h1>
<?php

?>
<div class="news-full">

  <p><?= $news['text'] ?>
  </p>
  <?= Html::img('@web/image/news/' . $news['image'] . '', ['alt' => 'Удалить', 'class' => 'icon', 'id' => 'arrow']); ?>
  <p><?= $news['date'] ?> г.</p>
  <button onclick="window.history.back()" class="button-back">Назад</button>

</div>

<div class="coments">
  <h2>Коментарии</h2>
  <?php $form = ActiveForm::begin(['options' => ['class' => 'form', 'id' => 'form-comments', 'style' => 'width: 100% !important;'],]) ?>
  <?= $form->field($model, 'text')->textInput(['autofocus' => true, 'class' => 'field-main', 'placeholder' => 'Введите текст...', 'style' => 'width: 100% !important;'])->label('') ?>
  <button type="submit" class="button-main">Отправить</button>
  <?php ActiveForm::end(); ?>
  <?
  $commentsAll = Comments::find()->all();
  foreach ($commentsAll as $comment) {
    if ($comment['news'] === $news['id']) {
      $author = User::findOne($comment['author']);
  ?>
      <div class="comments__item">
        <div class="comments__item__user">
          <span>
            <span>
              <div class="avatar">
                <p><?= mb_substr($author['firstname'], 0, 1) ?></p>
              </div>
              <p><?= $author['firstname'] . ' ' . $author['lastname'] ?></p>
            </span>
            <p><?= $comment['date'] ?></p>
          </span>
          <p><?= $comment['text'] ?></p>
        </div>

      </div>
  <?     # code...
    }
  } ?>

</div>