<?php

/** @var yii\web\View $this */

$this->title = 'Finansier | добавить слово';

use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<h1>Создать слово</h1>
<?php $form = ActiveForm::begin([]); ?>
<p>Введите данные</p>

<?= $form->field($model, 'word')->textInput(['class' => 'field-main', 'placeholder' => 'Заголовок'])->label('') ?>
<?= $form->field($model, 'description')->textarea(['class' => 'textarea-main', 'placeholder' => 'Текст'])->label('') ?>
<button type="submit" class="button-main">Добавить</button>
<?php ActiveForm::end(); ?>
<button onclick="window.history.back()" class="button-back">Назад</button>
</div>