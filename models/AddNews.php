<?php

namespace app\models;

use yii\base\Model;

class AddNews extends Model
{

  public  $autor;
  public  $image;
  public  $subtitle;
  public  $title;
  public  $text;
  public  $date;
  public function rules()
  {
    return [
      [['autor', 'image', 'title', 'subtitle', 'text', 'date'], 'required', 'message' => 'Введите значение...'],
      [['image'], 'file', 'extensions' => 'png, jpg'],

    ];
  }
  public function Add()
  {
    $news = new News();
    $news->autor = $this->autor;
    $news->image = $this->image;
    $news->title = $this->title;
    $news->subtitle = $this->subtitle;
    $news->text = $this->text;
    $news->date = $this->date;
    return $news->save();
  }
}
