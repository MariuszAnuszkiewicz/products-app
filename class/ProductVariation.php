<?php  namespace MariuszAnuszkiewicz\classes\ProductVariation;

use MariuszAnuszkiewicz\classes\Item\Item;

class ProductVariation implements Item {

  protected $color, $json;

  public function __construct($color) {

    if(gettype($color) === 'string') {
        $this->color = $color;
    } else {

      try {
         $throwDataType = new \UndefinedVariantColor();
         $throwDataType->checkTypeField($color);
      } catch (\UndefinedVariantColor $message) {
         echo $message->getMessage();
      }
    }
  }

  public function getId() {

     return $this->json['id'];
  }

  public function getNet() {
     $tax_value = (($this->json['price'] / 100) * 22);
     $sum_price = $this->json['price'] + $tax_value;
     return $sum_price;
  }
}