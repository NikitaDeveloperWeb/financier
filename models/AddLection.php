<?php

namespace app\models;

use yii\base\Model;

class AddLection extends Model
{

  public  $curse;
  public  $image;
  public  $description;
  public  $title;
  public  $text;

  public function rules()
  {
    return [
      [['curse', 'image', 'title', 'description', 'text'], 'required', 'message' => 'Введите значение...'],
      [['image'], 'file', 'extensions' => 'png, jpg'],

    ];
  }
  public function Add()
  {
    $news = new Lecture();
    $news->curse = $this->curse;
    $news->image = $this->image;
    $news->title = $this->title;
    $news->description = $this->description;
    $news->text = $this->text;
    return $news->save();
  }
}
