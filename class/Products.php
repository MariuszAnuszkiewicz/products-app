<?php namespace MariuszAnuszkiewicz\classes\Products;

use MariuszAnuszkiewicz\classes\Product\Product;

class Products extends \ArrayIterator {

   protected $objects, $numObjects = 0, $iterateNum = 0;

   public function __construct(Product $product) {

       $this->addObject($product);
   }

   public function addObject($obj) {

        $this->objects[$this->numObjects] = $obj;
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

        return (($this->numObjects - 1) == $this->iterateNum);
   }
}