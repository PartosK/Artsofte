<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class parserRowsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $path = 'tmp/test.xlsx';

        $config = [
            "parser_price_subcategory" => "2",
            "columns" => "price;vendor_code;title;announce;features;volume;"
        ];

        $result = \App\ParserXlsx::parserRows($path, $config);
        $this->assertTrue(true);
    }
}
