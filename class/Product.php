<?php namespace MariuszAnuszkiewicz\classes\Product;

use MariuszAnuszkiewicz\classes\ProductVariation\ProductVariation;

class Product extends ProductVariation {

    private $amount;

    public function __construct(string $filename) {

        if (file_exists($filename)) {
            $handler = file_get_contents($filename);
            $this->json = json_decode($handler, true);
        }
        try {
            $throw = new \ProductFileNotFound();
            $throw->checkFileExists($filename);
        } catch (\ProductFileNotFound $message) {
            echo $message->getMessage();
        }
    }

    public function getAmount() {

        $quantity = $this->json['quantity'];
        $price = $this->json['price'];

        if (empty($this->amount)) {

            $this->amount = ($quantity * $price);
        }
        return $this->amount;
    }

    public function __toString() {

        if(!empty($this->json)) {
            $output = '';
            foreach ($this->json as $key => $value) {
                $output .= $key . ": " . $value . "<br>";
            }
            return $output;
        } else {
            die();
        }
    }
}



