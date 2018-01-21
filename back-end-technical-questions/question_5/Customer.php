<?php

require("Rental.php")

class Customer 
{

    private $_name;     
    private $_rentals;

    public function __construct($name)     
    {         
        $this->_name = $name;         
        $this->_rentals = array();     
    } 
     
     public function addRental($rental)     
    {         
        array_push($this->_rentals, $rental);     
    } 
     
     
    public function getName()     
    {         
        return $this->_name;     
    } 
     
    public function getStatement()     
    {         
        $totalAmount = 0;         
        $frequentRenterPoints = 0;         
        $result = "Rental Record for " . $this->getName() . "\n";         
        
        foreach ($this->_rentals as $rental)         {             
            /* @var $rental Rental */             
            $thisAmount = 0; 
            
            // get price of rental
            $thisAmount = $rental->getPrice();

            // add frequent renter points             
            $frequentRenterPoints++; 

            // add bonus for a two day new release rental             
            if ($rental->hasRenterPointBonus()) $frequentRenterPoints++; 

            //show figures for this rental            
            $result .= "\t" . $rental->getFilm()->getTitle() . "\t" . $thisAmount . "\n";             
            $totalAmount += $thisAmount;
        } 
        return $result;     
    }
}