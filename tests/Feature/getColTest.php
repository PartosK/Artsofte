<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class getColTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $param = [
            "parser_price_subcategory" => "1",
            "columns" => "price;vendor_code;title;announce;features;"
        ];

        $return = \App\ParserXlsx::getColumnsConfig($param);
        $this->assertEquals('category',$return[1]);
    }

    public function testExample2()
    {
        $param = [
            "parser_price_subcategory" => "2",
            "columns" => "price;vendor_code;title;announce;features;volume;"
        ];

        $return = \App\ParserXlsx::getColumnsConfig($param);
        $this->assertEquals('category',$return[1]);
        $this->assertEquals('subcategory2',$return[2]);
    }

    public function testExample3()
    {
        $param = [
            "parser_price_subcategory" => "3",
            "columns" => "price;vendor_code;title;announce;features;volume;"
        ];

        $return = \App\ParserXlsx::getColumnsConfig($param);
        $this->assertEquals('category',$return[1]);
        $this->assertEquals('subcategory2',$return[2]);
        $this->assertEquals('subcategory3',$return[3]);
    }

    public function testExample4()
    {
        $param = [
            "parser_price_subcategory" => "4",
            "columns" => "price;vendor_code;title;announce;features;volume;"
        ];

        $return = \App\ParserXlsx::getColumnsConfig($param);
        $this->assertEquals(false  , is_array($return));
    }

    public function testExample5()
    {
        $param = 564564646;

        $return = \App\ParserXlsx::getColumnsConfig($param);
        $this->assertEquals(false  , is_array($return));
    }
}
