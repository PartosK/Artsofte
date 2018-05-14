<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;

class getCellsTest extends TestCase
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
            "columns" => "price;vendor_code;title;announce;features;"
        ];

        $result = \App\ParserXlsx::getRows($path, $config);
        $this->assertEquals(false  , $result->isEmpty());
        $this->assertEquals(true  , $result instanceof \Illuminate\Support\Collection);


    }

    public function testExample2()
    {
        $path = 'tmp/test.xlsx';

        $config = 5587777;

        $result = \App\ParserXlsx::getRows($path, $config);
        $this->assertEquals(false  , $result instanceof \Illuminate\Support\Collection);

    }

    public function testExample3()
    {

        $path = 'акпкпукпук';

        $config = [
            "parser_price_subcategory" => "2",
            "columns" => "price;vendor_code;title;announce;features;"
        ];

        $result = \App\ParserXlsx::getRows($path, $config);

        $this->assertEquals(false  , $result instanceof \Illuminate\Support\Collection);

    }
    public function testExample4()
    {

        $path = 'tmp/1.xlsx';

        $config = [
            "parser_price_subcategory" => "2",
            "columns" => "price;vendor_code;title;announce;features;"
        ];

        $result = \App\ParserXlsx::getRows($path, $config);
        $this->assertEquals(false  , $result instanceof \Illuminate\Support\Collection);

    }
}
