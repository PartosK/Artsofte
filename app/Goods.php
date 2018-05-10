<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{


    public static function  saveXlsxGoods(Goods $model)
    {
      return   $model->save();
    }

}
