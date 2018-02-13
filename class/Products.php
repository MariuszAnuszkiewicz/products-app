<?php namespace MariuszAnuszkiewicz\classes\Products;

use MariuszAnuszkiewicz\classes\Product\Product;
use MariuszAnuszkiewicz\classes\ProductVariation\ProductVariation;

class Products extends \ArrayIterator {

   protected $productObj, $productVariationObj;

   public function __construct(Product $product, ProductVariation $product_variation) {

       $this->productObj = $product;
       $this->productVariationObj = $product_variation;

   }
}