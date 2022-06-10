<?php

namespace app\models;

use app\models\Curse;

use yii\base\Model;
use yii;

/**
 * UserUpdate form
 */
class UpdateCurse extends Model
{
  public $author;
  public $level;
  public $description;
  public $title;

  /**
   * @var Curse
   */
  private $_curse;

  public function __construct(Curse $curse, $config = [])
  {
    $this->_curse = $curse;
    $this->author = $curse->author;
    $this->level = $curse->level;
    $this->description = $curse->description;
    $this->title = $curse->title;

    parent::__construct($config);
  }

  public function rules()
  {
    return [
      ['author', 'required'],
      ['description', 'required'],
      ['level', 'required'],
      ['title', 'required'],

    ];
  }

  public function update()
  {
    if ($this->validate()) {
      $curse = $this->_curse;
      $curse->author = $this->author;
      $curse->description = $this->description;
      $curse->level = $this->level;
      $curse->title = $this->title;
      return $curse->save();
    } else {
      return false;
    }
  }
}
