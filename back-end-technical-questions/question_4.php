<?php

/*

Starting at the top. Each animal group will have a basic class. Mammals, Birds, Reptiles, etc...

These classes will contain the basic properties and methods shared between the species inside the group. This may be color, hasFeathers, etc...

Interfaces will be used to define the methods needed to implement an cross-group animal feature, such as CanFly, CanSwim, CanWalk. 
This allows for continuity between the feature methods, however still allowing a duck to swim in a different way to a penguin.

CanEat is also an independent for each species as everyone eats different foods in different ways.


*/

interface CanSwim
{
    public function swim();
}

interface CanFly
{
    public function fly();
}

interface CanEat
{
    public function eat($food);
}

class Bird extends Animal
{
    public function getColor()
    {
        return $this->_color;
    }
}

class Duck extends Bird implements CanSwim, CanFly, CanEat
{

    private $_color = 'brown';

    public function swim()
    {
        echo "swimming";
    }

    public function fly()
    {
        echo "flying";
    }

    public function eat($food)
    {
        echo "eating $food";
    }
}