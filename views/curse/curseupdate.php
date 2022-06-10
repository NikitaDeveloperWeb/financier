<?php

/** @var yii\web\View $this */

$this->title = 'Financier | редактирвоание курса';

use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<h1>Редактировать курс</h1>
<?php $form = ActiveForm::begin([]); ?>
<p>Исправте данные</p>

<?= $form->field($model, 'title')->textInput(['class' => 'field-main', 'placeholder' => 'Заголовок'])->label('') ?>
<?= $form->field($model, 'description')->textarea(['class' => 'textarea-main', 'placeholder' => 'Текст'])->label('') ?>
<?= $form->field($model, 'level')->dropDownList([
  'Низкий' => 'Низкий',
  'Средний' => 'Средний',
  'Высокий' => 'Высокий'
])->label('Уровень') ?>

<button type="submit" class="button-main">Редактировать</button>
<?php ActiveForm::end(); ?>
<button onclick="window.history.back()" class="button-back">Назад</button>
</div>