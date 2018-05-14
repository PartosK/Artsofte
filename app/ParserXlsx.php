<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Illuminate\Support\Facades\Storage;

class ParserXlsx extends Model

{
    public static function getColumnsConfig($config)
    {
        if( (isset($config['parser_price_subcategory'])) AND $config['columns']) {
            $subcategory = $config['parser_price_subcategory'];

            if ($subcategory == 1) {
                $value[1] = 'category';
            } elseif ($subcategory == 2) {
                $value[1] = 'category';
                $value[2] = 'subcategory2';
            } elseif ($subcategory == 3) {
                $value[1] = 'category';
                $value[2] = 'subcategory2';
                $value[3] = 'subcategory3';
            } else {
                return null;
            }

            $columns = explode(";", $config['columns']);
            array_pop($columns);
            foreach ($columns as $column => $val) {
                $value[] = $val;
            }

            return $value;
        }
        else{
            return null;
        }
    }

    public static function getRows($file, $config){

        $path = __DIR__ . '/../storage/app/' . $file;

        $columns = self::getColumnsConfig($config);

        if(is_null($columns)){
            return 'Не верная настройка столбцов';
        }

        try {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
        } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
           return $e->getMessage();
        }
        catch ( \ErrorException | \InvalidArgumentException $e) {
            return "Ошибка загрузки файла";
        }

        $spreadsheet->setActiveSheetIndex(0);
        $aSheet = $spreadsheet->getActiveSheet();

        $highestRow = $aSheet->getHighestRow();
        $highestColumn = $aSheet->getHighestColumn();
        $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);

        $collection = collect();
        for ($row = 1; $row <= $highestRow; ++$row) {
            $collection->put($row,collect());
            foreach ($columns as $key => $value) {
                $cell = $aSheet->getCellByColumnAndRow($key, $row)->getValue();
                $cell = strip_tags($cell);
                $cell = addslashes ($cell);
                $cell = trim($cell);
                $collection[$row]->put($value, $cell);
            }
        }

        return $collection;

    }

    public static function parserRows($file, $config){

        $collections = self::getRows($file, $config);

        if (!$collections instanceof \Illuminate\Support\Collection){
            return $collections;
        }

        $result = \App\Goods::upload($collections);

        return $result;
    }
}
