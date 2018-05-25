<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase {

    public function testSomethingIsTrue() {
        $this->assertTrue(true);
    }

    public function testInsertAProduct() {
        $this->json('POST', '/api/v1/product', ['name' => 'item1',
            'category' => 'cat1',
            'subcategor' => 'cat2',
            'value' => 200,
            'collection_id' => 7,
            'tags' => [
                'porsche',
                'design'
            ]
        ])->seeInDatabase('product', ['name' => 'item1']);
    }

    /*
     * check returned json contains item1 insearted earlier
     */

    public function testcheckingAProduct() {
        $this->json('GET', '/api/v1/product/')->seeJSON(['name' => 'item1']);
    }

    public function testCanManageProducts() {
        $this->json('POST', '/api/v1/order', [
            'parameters' => [

                "order" => [

                    "items" => [ '*' => [
                            "name" => "Item1",
                            "qnt" => 1,
                            "value" => 1100,
                            "category" => "Fashion",
                            "subcategory" => "Jacket",
                            "tags" =>
                            ["porsche", "design"],
                            "collection_id" => 7
                        ]
                    ]
                ]
            ]
                ]
        )->seeStatusCode(200); 
    }
    public function testCanCalculateTheTotalPaymentAfterDiscountProducts() {
        $this->json('POST', '/api/v1/order', [
            'parameters' => [

                "order" => [

                    "items" => [ '*' => [
                            "name" => "Item1",
                            "qnt" => 1,
                            "value" => 1100,
                            "category" => "Fashion",
                            "subcategory" => "Jacket",
                            "tags" =>
                            ["porsche", "design"],
                            "collection_id" => 7
                        ]
                    ]
                ]
            ]
                ]
        )->seeJSON(['total_payment_after_discount' => 1001]);
    }

 

    public function testCanGetAllProducts() {
        $this->json('GET', '/api/v1/product/')->seeStatusCode(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample() {
        $this->get('/');

        $this->assertEquals(
                $this->app->version(), $this->response->getContent()
        );
    }

}
