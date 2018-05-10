<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Parser extends Controller
{
    public function postParser(Request $request)
    {
        $contents = $request->parser_config['file']->store('xlsx');
        $extension = $request->parser_config['file']->extension();
        if (('xlsx' == $extension) OR ('xls' == $extension)) {
            $columns = \App\Parser::getColumns($request->parser_config);
            $resultParser = \App\Parser::goParser($contents, $columns);

        } else {
            $resultParser = '0 не верный формат файла';
        }

        return view('index',
            [
                'resultParser' => $resultParser
            ]);

    }
}
