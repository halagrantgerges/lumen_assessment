<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    

     public function testSomethingIsTrue()
    {
        $this->assertTrue(true);
    }
//    
//    public function testDatabase()
//{
//    // Make call to application...
//
//    $this->seeInDatabase('product', ['name' => 'Item1']);
//}
  public function testBasicExample()
    {
   

        $this->json('POST', '/api/v1/product', 
                ['name' => 'item1',
            'category' => 'cat1',
            'subcategor'=> 200,
            'collection_id' => 7         
            ])->seeInDatabase('product', ['name' => 'item1']);
    }
    
    public function testB()
    {
   
$this->json('GET', '/api/v1/product/')->seeInDatabase('product', ['name' => 'item1']);
//             ->seeJson([
//                'name' => 'item1',
//             ]);
    }
//    public function testThatNameFieldIsRequiredToCreateAUser()
//    {
//        $this->json(
//            'POST', '/product', [
//                'name' => "haha"
//            ]
//        )->seeJson(
//            [
//                'name' => [
//                    'The name field is required.'
//                ]
//            ]
//        )->seeStatusCode(422);
//    }

  public function testCanGetAllProducts()
{
//       $this->get('/api/v1/product/');

//        $this->assertEquals(
//            $this->app->version(), $this->response->getContent()
//        );
  $this->json('GET', '/api/v1/product/')->seeStatusCode(200);
}


    /**
     * A basic test example.
     *
     * @return void
     */
    
  
public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }
    
 
}
