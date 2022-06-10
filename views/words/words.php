<?php

/** @var yii\web\View $this */

$this->title = 'Sneakers shop | словарь';

use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<h1>Словарь</h1>
<?
$word = '';
if (isset($_POST['word'])) {
  $word = $_POST['word'];
}
?>
<form class="form-search" action="<?= Url::to(['/words/search', 'word' => $word]) ?>">
  <input type="text" class="field-main" placeholder="Введите слово" name="word">
  <button class="button-main" type="submit">Найти</button>
</form>
<ul class="words">
  <h2>Найдите слово...</h2>


</ul>