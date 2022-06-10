<?php

namespace app\models;

use yii\base\Model;

class AddCurse extends Model
{

  public  $author;
  public  $level;
  public  $title;
  public  $description;

  public function rules()
  {
    return [
      [['author', 'level', 'title', 'description'], 'required', 'message' => 'Заполните поле'],

    ];
  }
  public function Add()
  {
    $news = new Curse();
    $news->author = $this->author;
    $news->level = $this->level;
    $news->title = $this->title;
    $news->description = $this->description;
    return $news->save();
  }
}
