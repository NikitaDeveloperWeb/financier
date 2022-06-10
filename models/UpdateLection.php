<?php

namespace app\models;

use app\models\Lecture;

use yii\base\Model;
use yii;

/**
 * UserUpdate form
 */
class UpdateLection extends Model
{
  public  $curse;
  public  $image;
  public  $description;
  public  $title;
  public  $text;
  /**
   * @var Lecture
   */
  private $_lection;

  public function __construct(Lecture $lection, $config = [])
  {
    $this->_lection = $lection;
    $this->curse = $lection->curse;
    $this->image = $lection->image;
    $this->description = $lection->description;
    $this->title = $lection->title;
    $this->text = $lection->text;
    parent::__construct($config);
  }

  public function rules()
  {
    return [
      [['curse', 'image', 'description', 'title', 'text'], 'required', 'message' => 'Введите значение...'],
    ];
  }

  public function update()
  {
    if ($this->validate()) {
      $lection = $this->_lection;
      $lection->curse = $this->curse;
      $lection->image = $this->image;
      $lection->description = $this->description;
      $lection->text = $this->text;
      $lection->title = $this->title;
      return $lection->save();
    } else {
      return false;
    }
  }
}
