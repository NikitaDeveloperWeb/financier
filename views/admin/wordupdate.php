<?php

/** @var yii\web\View $this */

$this->title = 'Financier | редактирвоание слова';

use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<h1>Редактировать слово</h1>
<?php $form = ActiveForm::begin([]); ?>
<p>Исправте данные</p>

<?= $form->field($model, 'word')->textInput(['class' => 'field-main', 'placeholder' => 'Заголовок'])->label('') ?>
<?= $form->field($model, 'description')->textarea(['class' => 'textarea-main', 'placeholder' => 'Текст'])->label('') ?>

<button type="submit" class="button-main">Редактировать</button>
<?php ActiveForm::end(); ?>
<button onclick="window.history.back()" class="button-back">Назад</button>
</div>