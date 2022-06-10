<?php

/** @var yii\web\View $this */

$this->title = 'Finansier | добавить лекцию';

use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<h1>Добавить лекцию</h1>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<p>Введите данные</p>

<?= $form->field($model, 'title')->textInput(['class' => 'field-main', 'placeholder' => 'Заголовок'])->label('') ?>
<?= $form->field($model, 'description')->textarea(['class' => 'textarea-main', 'placeholder' => 'Подзаголовок'])->label('') ?>
<?= $form->field($model, 'text')->textarea(['class' => 'textarea-main', 'placeholder' => 'Текст'])->label('') ?>
<?= $form->field($model, 'image')->fileInput(['class' => 'textarea-main', 'placeholder' => 'Текст'])->label('') ?>
<button type="submit" class="button-main">Добавить</button>
<?php ActiveForm::end(); ?>
<button onclick="window.history.back()" class="button-back">Назад</button>
</div>