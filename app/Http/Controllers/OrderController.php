<?php

namespace App\Http\Controllers;
use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public $collectionsArr;
    public $totalDiscountValue;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->collectionsArr=array();
        $this->totalDiscountValue=0;
     
    }

    public function getDiscountValue()
    {
       $pageContent= file_get_contents("https://developer.github.com/v3/#http-rediects");
       return substr_count($pageContent,"status");
    }
    
    public function calculateTotalDiscountValue($request,$singleDiscountValue)
    {
       $mappedDiscountValue=0;
       $totalNetValue=0;
       $totalNumberOfQnt=0;
       $this->totalDiscountValue=0;
       $requestDataArr=$request->all();
       $items=$requestDataArr["parameters"]["order"]["items"];
       foreach ($items as $item)
       {   
           $this->collectionsArr["collection_".$item["collection_id"]][]=$item;
           $itemNetValue=$item["qnt"]*$item["value"]; // item net value = value * qnt
           $totalNetValue+=$itemNetValue;
           $totalNumberOfQnt+=$item["qnt"]; // get all qnt in order to calculate the total discount
       }
       
        $numberOfUniqueCollections=count($this->collectionsArr);
       if($numberOfUniqueCollections==1) // orders from the same collections then we will apply the discount
       {
           $this->totalDiscountValue=$singleDiscountValue*$totalNumberOfQnt;
           if($this->totalDiscountValue>25)
               $this->totalDiscountValue=25; // max discount
          
       }
       
       $totalPayedValue=$totalNetValue-($this->totalDiscountValue*$totalNetValue/100);
        $this->collectionsArr["total_net_value"]=$totalNetValue;
        $this->collectionsArr["total_discount"]=$this->totalDiscountValue;
        $this->collectionsArr["total_payment_after_discount"]=$totalPayedValue;
        return $this->collectionsArr;
    }
    public function manageOrder(Request $request){
//           print_r($request->all());
//        die();
        return $this->calculateTotalDiscountValue($request,$this->getDiscountValue());
 
	}
    //
}
