<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Collection;

class Goods extends Model
{

    public static function toValidGood(Collection $collection)
    {
        $collection->transform(function ($value, $key) {
            switch ($key) {
                case 'category':
                case 'subcategory2':
                case 'subcategory3':
                case 'vendor_code':
                case 'title':
                case 'announce':
                case 'features':
                case 'description':
                    if (empty($value)) {
                        return null;
                    } else {
                        $value = substr($value, 0, 255);
                        return $value;
                    }
                    break;

                case 'price':
                case 'weight':
                case 'volume':
                    $value = (float)$value;
                    return $value;
                    break;
                default:
                    return null;
            }
        });

        return $collection;
    }

    public static function readyToUp(Collection $collection){

        foreach ($collection as $item => $value) {

            switch ($item) {
                case 'category':
                case 'vendor_code':
                case 'title':
                case 'price':
                    if (is_null($value))
                        return false;
                    break;
                default:
                    return true;
            }
        }

    }

    public static function saveGood(Collection $collection){

        $vendor_code = $collection->get('vendor_code');
        $model = \App\Goods::where('vendor_code','=', $vendor_code)->get();

        $category = $collection->get('category');
        $category_id = \App\Category::getForSaveGood($category);

        if (is_null($category_id)){
            return false;
        }

        $subcategory2 = $collection->get('subcategory2');
        $subcategory2_id = \App\Subcategory2::getForSaveGood($subcategory2);

        $subcategory3 = $collection->get('subcategory3');
        $subcategory3_id = \App\Subcategory3::getForSaveGood($subcategory3);

        if ($model->isEmpty()){
            $model = new Goods();
        }
        else{
            $model = $model[0];
        }

        $model->category_id = $category_id;
        $model->subcategory2_id = $subcategory2_id;
        $model->subcategory3_id = $subcategory3_id;
        $model->vendor_code = $vendor_code;
        $model->title = $collection->get('title');
        $model->announce = $collection->get('announce');
        $model->features = $collection->get('features');
        $model->description = $collection->get('description');
        $model->price = $collection->get('price');
        $model->weight = $collection->get('weight');
        $model->volume = $collection->get('volume');


        try{
          $result =  $model->save();
        }
        catch (\Exception $e) {
            $result = false;
        }
        return $result;
    }

    public static function  upload(Collection $collections)
    {
        $count_save = 0;
        $error_row = 'Не загружены строки:';

        foreach ($collections as $row => $collection) {
            $validCollection = \App\Goods::toValidGood($collection);
            $readyToUp = \App\Goods::readyToUp($validCollection);
            if ($readyToUp){
                $result = \App\Goods::saveGood($validCollection);

                if (true == $result){
                    $count_save ++;
                }
                else{
                    $error_row .= " $row";
                }
            }
            else{
                $error_row .= " $row";
            }


        }


         return $count_save. ' '.$error_row;
    }


    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function subcategory2()
    {
        return $this->belongsTo('App\Subcategory2', 'subcategory2_id');
    }

    public function subcategory3()
    {
        return $this->belongsTo('App\Subcategory3', 'subcategory3_id');
    }

}
