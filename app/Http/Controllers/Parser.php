<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Parser extends Controller
{
    public function postParser(Request $request)
    {
        $file = $request->parser_config['file']->store('tmp');
        $extension = $request->parser_config['file']->extension();
        $config = $request->parser_config;

        switch ($extension) {
            case 'xlsx':
            case 'xls':
                $resultParser = \App\ParserXlsx::parserRows($file, $config);
                break;
            default:
                $resultParser = '0 не верный формат файла';

        }

        Storage::delete($file);

        return view('index',
            [
                'resultParser' => $resultParser
            ]);

    }
}
