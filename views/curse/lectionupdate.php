<?php

/** @var yii\web\View $this */

$this->title = 'Financier | редактирвоание лекции';

use app\models\Lecture;
use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<h1>Редактировать лекцию</h1>
<?php
$lection = Lecture::findOne($idLection);
$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<p>Исправте данные</p>

<?= $form->field($model, 'title')->textInput(['class' => 'field-main', 'placeholder' => 'Заголовок'])->label('') ?>
<?= $form->field($model, 'description')->textarea(['class' => 'textarea-main', 'placeholder' => 'Подзаголовок'])->label('') ?>
<?= $form->field($model, 'text')->textarea(['class' => 'textarea-main', 'placeholder' => 'Текст'])->label('') ?>
<?= $form->field($model, 'image')->fileInput(['class' => 'upload', 'placeholder' => 'Текст', 'value' => $lection['image']])->label('') ?>
<?= Html::img('@web/image/lection/' . $lection['image'] . '', ['alt' => '', 'class' => 'img', 'id' => 'arrow']); ?>
<button type="submit" class="button-main">Редактировать</button>
<?php ActiveForm::end(); ?>
<button onclick="window.history.back()" class="button-back">Назад</button>
</div>