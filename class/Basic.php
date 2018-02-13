<?php namespace MariuszAnuszkiewicz\classes\Basic;

use MariuszAnuszkiewicz\classes\Products\Products;
use MariuszAnuszkiewicz\classes\Product\Product;
use MariuszAnuszkiewicz\classes\ProductVariation\ProductVariation;

class Basic {

    protected static $random, $product, $products;

    public static function generateRandomItems(int $range, string $file, string $color) {

        self::$random = rand(1, $range);
        self::$product = new Product($file);
        self::$products = new Products(new Product($file));
        return self::$products->getCurrent();

    }

    public function showItems() {

        return self::$product->getId();
    }
}