<?php

namespace app\models;


use yii\base\Model;
use yii;

/**
 * UserUpdate form
 */
class UpdateWords extends Model
{
  public $word;
  public $description;


  /**
   * @var Words
   */
  private $_word;

  public function __construct(Words $word, $config = [])
  {
    $this->_word = $word;
    $this->word = $word->word;
    $this->description = $word->description;


    parent::__construct($config);
  }

  public function rules()
  {
    return [
      ['word', 'required'],
      ['description', 'required'],

    ];
  }

  public function update()
  {
    if ($this->validate()) {
      $word = $this->_word;
      $word->word = $this->word;
      $word->description = $this->description;
      return $word->save();
    } else {
      return false;
    }
  }
}
