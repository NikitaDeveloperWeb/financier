<?php

namespace app\models;


use yii\base\Model;
use yii;

/**
 * UserUpdate form
 */
class UpdateNews extends Model
{
  public  $autor;
  public  $image;
  public  $subtitle;
  public  $title;
  public  $text;
  public  $date;
  /**
   * @var News
   */
  private $_news;

  public function __construct(News $news, $config = [])
  {
    $this->_news = $news;
    $this->autor = $news->autor;
    $this->image = $news->image;
    $this->subtitle = $news->subtitle;
    $this->title = $news->title;
    $this->text = $news->text;
    $this->date = $news->date;
    parent::__construct($config);
  }

  public function rules()
  {
    return [
      [['autor', 'image', 'subtitle', 'title', 'text', 'date'], 'required', 'message' => 'Введите значение...'],
    ];
  }

  public function update()
  {
    if ($this->validate()) {
      $news = $this->_news;
      $news->autor = $this->autor;
      $news->image = $this->image;
      $news->subtitle = $this->subtitle;
      $news->text = $this->text;
      $news->title = $this->title;
      $news->date = $news->date;
      return $news->save();
    } else {
      return false;
    }
  }
}
