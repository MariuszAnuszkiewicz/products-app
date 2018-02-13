<?php

class UndefinedVariantColor extends Exception{

  public function checkTypeField($string) {
    if(gettype($string) !== 'string') {
       throw new UndefinedVariantColor("argument must be string type.");
    }
    return;
  }
}