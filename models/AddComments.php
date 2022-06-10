<?php

namespace app\models;

use yii\base\Model;

class AddComments extends Model
{

  public  $author;
  public  $text;
  public  $date;
  public  $news;

  public function rules()
  {
    return [
      [['author', 'text', 'date', 'news'], 'required', 'message' => 'Заполните поле'],

    ];
  }
  public function Add()
  {
    $news = new Comments();
    $news->author = $this->author;
    $news->text = $this->text;
    $news->date = $this->date;
    $news->news = $this->news;
    return $news->save();
  }
}
