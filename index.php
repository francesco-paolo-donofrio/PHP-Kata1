<?php
echo "Hello, World!";


// Excercise Kata n.1

// Define a class called Person.

// Excercise Kata n.2

// Since all Persons are of the species "Homo Sapiens", make that a class constant.

// Excercise Kata n.3

// Declare (but do not define yet) the 3 class properties $name, $age and $occupation. *They should all be *public.

// Excercise Kata n.4

// Define a class constructor which accepts exactly three arguments in the following order: $name, $age, $occupation and store them in their respective properties.

class Person
{
    const SPECIES = "Homo Sapiens";
    public $name;
    public $age;
    public $occupation;

    public function __construct($name, $age, $occupation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }
}



