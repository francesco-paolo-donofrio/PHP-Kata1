<?php
echo "Hello, World!";


// Exercise Kata n.1

// Define a class called Person.

// Exercise Kata n.2

// Since all Persons are of the species "Homo Sapiens", make that a class constant.

// Exercise Kata n.3

// Declare (but do not define yet) the 3 class properties $name, $age and $occupation. *They should all be *public.

// Exercise Kata n.4

// Define a class constructor which accepts exactly three arguments in the following order: $name, $age, $occupation and store them in their respective properties.

// Exercise Kata n.5

// Define a method called introduce which accepts no arguments and returns a string of the format "Hello, my name is NAME_HERE"

// Exercise Kata n.6

// Define another method called describe_job which accepts no arguments and returns a string of the format "I am currently working as a(n) OCCUPATION_HERE" (NOTE: The "a(n)" part of the string is literal which means you do not have to create conditionals to check whether "a" or "an" should be used.)

// Exercise Kata n.7
// When extraterrestrials arrive on Earth, all Persons are expected to greet them in exactly the same way. Therefore, define a static class method called greet_extraterrestrials which accepts an argument $species and returns a string of the format "Welcome to Planet Earth SPECIES_NAME_HERE!"
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

    public function introduce()
    {
        return "Hello, my name is {$this->name}";
    }

    public function describe_job()
    {
        return "I am currently working as a {$this->occupation}";
    }
}







