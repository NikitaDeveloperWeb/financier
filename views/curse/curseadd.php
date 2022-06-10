<?php

/** @var yii\web\View $this */

$this->title = 'Finansier | создать курс';

use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<h1>Создать курс</h1>
<?php $form = ActiveForm::begin([]); ?>
<p>Введите данные</p>

<?= $form->field($model, 'title')->textInput(['class' => 'field-main', 'placeholder' => 'Заголовок'])->label('') ?>
<?= $form->field($model, 'description')->textarea(['class' => 'textarea-main', 'placeholder' => 'Текст'])->label('') ?>
<?= $form->field($model, 'level')->dropDownList([
  'Низкий' => 'Низкий',
  'Средний' => 'Средний',
  'Высокий' => 'Высокий'
])->label('Уровень') ?>
<button type="submit" class="button-main">Добавить</button>
<?php ActiveForm::end(); ?>
<button onclick="window.history.back()" class="button-back">Назад</button>
</div>