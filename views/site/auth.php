<?php

/** @var yii\web\View $this */

$this->title = 'Financier | аутентификация';

use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<body>
  <div class="wrapper">
    <div class="wrapper__subwrapper">
      <a href="<?= Url::to(['site/index']); ?>" class="logo">
        <h1>F</h1>
        inancier
      </a>
      <?php $form = ActiveForm::begin(['options' => ['class' => 'form', 'id' => "form_login"]]); ?>
      <?= $form->field($login_model, 'email')->input('email', ['class' => 'field-main', 'placeholder' => 'Почта'])->label('');  ?>
      <?= $form->field($login_model, 'password')->passwordInput(['class' => 'field-main', 'placeholder' => 'Пароль'])->label(''); ?>
      <button type="submit" class="button-main">Войти</button>
      <?php ActiveForm::end(); ?>

      <?php $form = ActiveForm::begin(['options' => ['class' => 'form', 'id' => 'form-registration'],]) ?>
      <?= $form->field($modelReg, 'username')->textInput(['autofocus' => true, 'class' => 'field-main', 'placeholder' => 'Имя пользователя'])->label('') ?>
      <?= $form->field($modelReg, 'lastname')->textInput(['class' => 'field-main', 'placeholder' => 'Фамилия'])->label('') ?>
      <?= $form->field($modelReg, 'firstname')->textInput(['autofocus' => true, 'class' => 'field-main', 'placeholder' => 'Имя'])->label('') ?>
      <?= $form->field($modelReg, 'secondname')->textInput(['class' => 'field-main', 'placeholder' => 'Отчество'])->label('') ?>
      <?= $form->field($modelReg, 'email')->input('email', ['class' => 'field-main', 'placeholder' => 'Почта'])->label('') ?>
      <?= $form->field($modelReg, 'phone')->textInput(['class' => 'field-main', 'placeholder' => 'Номер телефона'])->label('') ?>
      <?= $form->field($modelReg, 'password')->passwordInput(['class' => 'field-main', 'placeholder' => 'Пароль'])->label('') ?>
      <?= $form->field($modelReg, 'password_repeat')->passwordInput(['class' => 'field-main', 'placeholder' => 'Повторите пароль'])->label('') ?>
      <span>
        <input type="checkbox" id="politics" onclick="check();" value="" autocomplete="off" class="politicChechbox" />
        <p> Нажимая на кнопку "Отправить", я даю согласие на
          обработку персональных данных.</p>
      </span>
      <button type="submit" class="button-main button-disabled" id="signUpbut" disabled="">Отправить</button>


      <?php ActiveForm::end(); ?>
      <div class="switch" onclick="changeFormsState()">
        <h3></h3>
      </div>
    </div>
  </div>

</body>
<script>
  function check() {
    var submit = document.querySelector('#signUpbut');
    if (document.querySelector('#politics').checked) {
      submit.classList.remove('button-disabled');
      submit.disabled = '';
    } else {
      submit.classList.add('button-disabled');
      submit.disabled = 'disabled';
    }
  }
</script>

</html>