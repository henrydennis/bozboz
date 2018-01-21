<?php

require_once("Film.php");

class Rental 
{   

    private $_film;     
    private $_daysRented; 

    public function __construct($film, $daysRented)     
    {         
        $this->_film = $film;         
        $this->_daysRented = $daysRented;     
    } 
    public function getDaysRented()     
    {         
        return $this->_daysRented;     
    }
     
    /**     
     * @return Film
     */     
    public function getFilm()     
    {         
        return $this->_film;     
    } 

    public function getPrice($priceCode)
    {

        $thisAmount = 0;

        //determine amount for rental           
        switch ($this->_film->getPriceCode())             
        {
            case Film::REGULAR:                     
                $thisAmount += 2;                     
                if ($this->getDaysRented() > 2)                         
                $thisAmount += ($this->getDaysRented() - 2) * 1.5;
                return $thisAmount;                     
                break;                 
            case Film::NEW_RELEASE:                     
                $thisAmount += $this->getDaysRented() * 3;
                return $thisAmount;           
                break;                 
            case Film::CHILDRENS:                     
                $thisAmount += 1.5;                     
                if ($this->getDaysRented() > 3)                        
                $thisAmount += ($this->getDaysRented() - 3) * 1.5;
                return $thisAmount;                   
                break;
            default:
                return "No price for code: $priceCode";
                break;
        }
    }

    public function hasRentalPointBonus()
    {
        if ($this->_film->getPriceCode() == Film::NEW_RELEASE && $this->getDaysRented() > 1)
        {
            return true;
        } 
        else
        {
            return false;
        }
        
    }

} 