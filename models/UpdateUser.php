<?php

namespace app\models;

use app\models\User;

use yii\base\Model;
use yii;

/**
 * UserUpdate form
 */
class UpdateUser extends Model
{
  public $email;
  public $firstname;
  public $lastname;
  public $secondname;
  public $username;
  public $phone;
  /**
   * @var User
   */
  private $_user;

  public function __construct(User $user, $config = [])
  {
    $this->_user = $user;
    $this->email = $user->email;
    $this->firstname = $user->firstname;
    $this->lastname = $user->lastname;
    $this->secondname = $user->secondname;
    $this->username = $user->username;
    $this->phone = $user->phone;
    parent::__construct($config);
  }

  public function rules()
  {
    return [
      ['email', 'required'],
      ['firstname', 'required'],
      ['lastname', 'required'],
      ['secondname', 'required'],
      ['username', 'required'],
      ['phone', 'required'],
      ['email', 'email'],
      [
        'email',
        'unique',
        'targetClass' => User::className(),
        'message' => Yii::t('app', 'ERROR_EMAIL_EXISTS'),
        'filter' => ['<>', 'id', $this->_user->id],
      ],
      [['email', 'firstname', 'lastname', 'secondname', 'phone', 'username'], 'string', 'max' => 255],
    ];
  }

  public function update()
  {
    if ($this->validate()) {
      $user = $this->_user;
      $user->email = $this->email;
      $user->firstname = $this->firstname;
      $user->lastname = $this->lastname;
      $user->secondname = $this->secondname;
      $user->username = $this->username;
      $user->phone = $this->phone;
      return $user->save();
    } else {
      return false;
    }
  }
}
