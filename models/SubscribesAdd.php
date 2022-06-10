<?php

namespace app\models;


use yii\base\Model;

class SubscribesAdd extends Model
{

  public  $id_user;
  public  $id_curse;


  public function subscribies()
  {
    $sub = new Subscribes_curse();
    $sub->id_user = $this->id_user;
    $sub->id_curse = $this->id_curse;
    return $sub->save();
  }
}
