<?php namespace MariuszAnuszkiewicz\classes\Basic;

use MariuszAnuszkiewicz\classes\Products\Products;
use MariuszAnuszkiewicz\classes\Product\Product;
use MariuszAnuszkiewicz\classes\ProductVariation\ProductVariation;

class Basic {

    protected static $random, $product, $products_array = [];

    public static function generateRandomItems(int $range, string $file, string $color) {

        echo self::$random = rand(1, $range);
        $products = new Products(new Product($file), new ProductVariation($color));
        self::$product = new Product($file);

            if (self::$product->getId() == 1) {
                self::showItems();
            }

        return self::$products_array[] = $products;

    }

    public function showItems() {
        return self::$product->getId();
    }

}