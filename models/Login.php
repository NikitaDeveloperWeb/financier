<?php

namespace app\models;

use yii\base\Model;

class Login extends Model
{

  public $email;
  public $password;
  public static $isAuth = false;
  public function rules()
  {
    return [
      [['email', 'password'], 'required', 'message' => 'Заполните поле'],
      ['email', 'email'],
      ['password', 'validatePassword'] //собственная функция для валидации пароля
    ];
  }

  public function validatePassword($attribute, $params)
  {
    if (!$this->hasErrors()) {
      $user = $this->getUser();

      if (!$user || !$user->validatePassword($this->password)) {
        $this->addError($attribute, 'Пароль или пользователь введен не верно');
      }
    }
  }
  public function getUser()
  {
    return User::findOne(['email' => $this->email]);
  }

  public function status()
  {
    self::$isAuth = true;
    return self::$isAuth;
  }
}
