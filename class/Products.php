<?php namespace MariuszAnuszkiewicz\classes\Products;

use MariuszAnuszkiewicz\classes\Product\Product;
use MariuszAnuszkiewicz\classes\ProductVariation\ProductVariation;

class Products extends \ArrayIterator {

   protected $objects = [], $numObjects, $iterateNum = 0;

   public function __construct(Product $product) {

       $this->add($product);
   }

   public function add($obj) {

        $this->objects[] = $obj;
        $this->numObjects++;
   }

   public function getCurrent() {

       return $this->objects[$this->iterateNum];
   }

   public function next() {

        $num = ($this->currentObjIsLast()) ? 0 : $this->iterateNum + 1;
        $this->iterateNum = $num;
   }

   public function currentObjIsLast() {

        return (($this->numObjects-1) == $this->iterateNum);
   }
}