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
            "parser_price_subcategory" => "2",
            "columns" => "price;vendor_code;title;announce;features;"
        ];

        $return = \App\Parser::getColumns($param);
        $this->assertEquals('category',$return[0]);
    }
}
