<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Illuminate\Support\Facades\Storage;

class Parser extends Model
{
    public static function getColumns($config)
    {
        $subcategory = $config['parser_price_subcategory'];

        if ($subcategory == 1) {
            $value[0] = 'category';
        } elseif ($subcategory == 2) {
            $value[0] = 'category';
            $value[1] = 'subcategory2';
        } elseif ($subcategory == 3) {
            $value[0] = 'category';
            $value[1] = 'subcategory2';
            $value[2] = 'subcategory3';
        }

        $columns = explode(";", $config['columns']);
        array_pop($columns);
        $result = array_merge($value, $columns);
        return $result;
    }


    public static function goParser($file, $columns)
    {
        $path = __DIR__ . '/../storage/app/' . $file;
        $count = 0;

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
        $spreadsheet->setActiveSheetIndex(0);
        $aSheet = $spreadsheet->getActiveSheet();

        $highestRow = $aSheet->getHighestRow();
        $highestColumn = $aSheet->getHighestColumn();
        $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);

        if ($columns[0] == 2) {
            $col = 2;
        } elseif ($columns[0] == 3) {
            $col = 3;
        } else {
            $col = 1;
        }

        for ($row = 2; $row <= $highestRow; ++$row) {
            $Goods = new \App\Goods();
            foreach ($columns as $key => $value) {
                $Goods->$value = $aSheet->getCellByColumnAndRow($key + $col, $row)->getValue();
            }

            $Goods_s = \App\Goods::saveXlsxGoods($Goods);

            if ($Goods_s) {
                $count++;
            }

        }

        Storage::delete($file);
        return $count;


    }

}
