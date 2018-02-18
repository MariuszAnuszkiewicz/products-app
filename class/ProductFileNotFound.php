<?php

class ProductFileNotFound extends Exception{

  public function checkFileExists($filename) {
    $file_name =  basename($filename);
    if (!file_exists($filename)) {
       throw new ProductFileNotFound("<b>" . $file_name . "</b>" . " file not exists.");

    }
    return;
  }
}


