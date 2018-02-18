<?php namespace MariuszAnuszkiewicz\classes\Basic;

use MariuszAnuszkiewicz\classes\Products\Products;
use MariuszAnuszkiewicz\classes\Product\Product;
use MariuszAnuszkiewicz\classes\ProductVariation\ProductVariation;

class Basic {

    protected static $product, $products, $variation, $colors;

    public static function generateRandomItems(int $quantity_products) {

       $directory = ROOT . './products/*.*';
       $files = glob($directory);
       self::$colors = ["red", "green", "blue", "white", "black", null];
       $outputProducts = null;
       $outputId = null;
       $outputColor = null;

        for ($i = 0; $i < $quantity_products; $i++) {
            self::$product = new Product($files[$i]);
            self::$products = new Products(new Product($files[$i]));
            $outputProducts .= self::showItems();

            if (self::$product->getId() % 2 == 0) {
                if (self::$product instanceof ProductVariation) {
                    $outputId .= self::$product->getId() . ", ";
                    $outputColor .= self::$product->color;
                }
            } else {
                $outputId .= self::$product->getId() . ", ";
            }
        }

        shuffle(self::$colors);
        foreach (self::$colors as $color) {
            if (is_string($color)) {
                self::$variation = new ProductVariation($color);
                break;
            }
            if ($color === null) {
                try {
                    $throwDataType = new \UndefinedVariantColor();
                    $throwDataType->checkTypeField($color);
                } catch (\UndefinedVariantColor $message) {
                    echo $message->getMessage();
                }
            }
        }
        $outputColor .= self::$variation->color;

        switch ("products") {
            case "id":
                return $outputId;
                break;
            case "products":
                return $outputProducts;
                break;
            case "color":
                return $outputColor;
                break;
        }
    }

    public function showItems() {
        return self::$products->getCurrent();
    }
}