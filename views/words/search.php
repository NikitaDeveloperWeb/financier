<?php

/** @var yii\web\View $this */

$this->title = 'Financier | словарь';

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
<form class="form-search" action="<?= Url::to(['/words/search']) ?>">
  <input type="text" class="field-main" placeholder="Введите слово" name="word">
  <button class="button-main" type="submit">Найти</button>
</form>
<ul class="words">
  <li>
    <span>
      <h3><?= $words['word'] ?></h3>
    </span>
    <p> <strong>&mdash;</strong><?= $words['description'] ?></p>
  </li>

</ul>