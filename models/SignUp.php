<?php

namespace app\models;

use yii\base\Model;

class SignUp extends Model
{

  public  $firstname;
  public  $lastname;
  public  $secondname;
  public  $phone;
  public $typeUser;
  public $email;
  public $username;
  public $password;
  public $password_repeat;
  public function rules()
  {
    return [
      [['email', 'password', 'lastname', 'firstname', 'password_repeat', 'typeUser', 'username', 'phone', 'secondname'], 'required', 'message' => 'Заполните поле'],
      ['email', 'email'],
      [['password'], 'string', 'min' => 5, 'max' => 100, 'message' => 'Пароль должен содержать не менее 5 символов.'],
      ['password', 'compare', 'compareAttribute' => 'password_repeat', 'message' => 'Пароли не совпадают'],
    ];
  }
  public function signup()
  {
    $user = new User();
    $user->firstname = $this->firstname;
    $user->lastname = $this->lastname;
    $user->secondname = $this->secondname;
    $user->phone = $this->phone;
    $user->username = $this->username;
    $user->email = $this->email;
    $user->typeUser = $this->typeUser;
    $user->setPassword($this->password);
    return $user->save();
  }
}
