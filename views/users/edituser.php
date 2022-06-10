<?php

/** @var yii\web\View $this */

$this->title = 'Financier | редактирвоание пользователя';

use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<h1>Редактировать профиль</h1>
<?php $form = ActiveForm::begin([]); ?>
<p>Исправте данные</p>

<?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'field-main', 'placeholder' => 'Имя пользователя'])->label('') ?>
<?= $form->field($model, 'firstname')->textInput(['class' => 'field-main', 'placeholder' => 'Имя'])->label('') ?>
<?= $form->field($model, 'lastname')->textInput(['class' => 'field-main', 'placeholder' => 'Фамилия'])->label('') ?>
<?= $form->field($model, 'secondname')->textInput(['class' => 'field-main', 'placeholder' => 'Отчество'])->label('') ?>
<?= $form->field($model, 'email')->input('email', ['class' => 'field-main', 'placeholder' => 'Почта'])->label('') ?>
<?= $form->field($model, 'phone')->textInput(['class' => 'field-main', 'placeholder' => 'Номер'])->label('') ?>
<button type="submit" class="button-main">Редактировать</button>
<?php ActiveForm::end(); ?>
<button onclick="window.history.back()" class="button-back">Назад</button>
</div>