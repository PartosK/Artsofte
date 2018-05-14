<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 14.05.2018
 * Time: 10:10
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

abstract class AbsCategory extends Model
{

    public static function getForSaveGood($category){

        if(!is_null($category)) {
            $model = new static();

            $category_model = $model::where('id', '=', $category)
                ->orWhere('name', '=', $category)
                ->get();
            if ($category_model->isEmpty() AND !is_numeric($category)) {
                $model->name = $category;
                $model->save();
                return $model->id;
            } else {
                if ($category_model->isEmpty()) return null;
                return $category_model[0]->id;
            }
        }
        else{
            return null;
        }
    }

}