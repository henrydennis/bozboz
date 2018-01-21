<?php 

require_once("Price.php")

class Film
{   

    private $_title;     
    private $_priceCode; 
     
    const CHILDRENS = 2;     
    const REGULAR = 0;     
    const NEW_RELEASE = 1;

    public function __construct($title, $priceCode)     
    {         
        $this->_title = $title;         
        $this->_priceCode = $priceCode;     
    } 
     
    public function getPriceCode()     
    {         
        return $this->_priceCode;     
    } 
     
    public function setPriceCode($value)     
    {         
        $this->_priceCode = $value;     
    }
     
    public function getTitle()     
    {         
        return $this->_title;     
    } 
     
}