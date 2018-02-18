<?php  namespace MariuszAnuszkiewicz\classes\ProductVariation;

use MariuszAnuszkiewicz\classes\Item\Item;

class ProductVariation implements Item {

  protected $json;
  public $color;

  public function __construct(string $color) {
     if(is_string($color)) {
         $this->color = $color;
     }
  }

  public function getId() {

     return $this->json['id'];
  }

  public function getNet() {
     $tax_value = (($this->json['price'] / 100) * 23);
     $sum_price = $this->json['price'] + $tax_value;
     return $sum_price;
  }
}