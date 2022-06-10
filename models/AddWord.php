<?php

namespace app\models;

use yii\base\Model;

class AddWord extends Model
{

  public  $word;
  public  $description;


  public function rules()
  {
    return [
      [['word', 'description'], 'required', 'message' => 'Заполните поле'],

    ];
  }
  public function Add()
  {
    $news = new Words();
    $news->word = $this->word;
    $news->description = $this->description;
    return $news->save();
  }
}
