<?php
echo "Hello, World!";

// FIRST KATA

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

// SECOND KATA

// Given an array of integers.

// Return an array, where the first element is the count of positives numbers and the second element is sum of negative numbers. 0 is neither positive nor negative.

// If the input is an empty array or is null, return an empty array.


$franArray = [1, 5, 2, 3, 4, -15, -15, -15, -15];
function countPositivesSumNegatives($input): array {
    // Check if the input is empty or null
    if (empty($input)) {
        return [];
    }

    $positiveCount = 0;
    $negativeSum = 0;

    // Loop through the array and count positives and sum negatives
    foreach ($input as $num) {
        if ($num > 0) {
            $positiveCount++;
        } elseif ($num < 0) {
            $negativeSum += $num;
        }
    }

    // Return the result as an array
    return [$positiveCount, $negativeSum];
}

var_dump(countPositivesSumNegatives($franArray));

// THIRD KATA

// You have to implement a vm function returning an object.

// It should accept an optional parameter that represents the initial version. The input will be in one of the following formats: "{MAJOR}", "{MAJOR}.{MINOR}", or "{MAJOR}.{MINOR}.{PATCH}". More values may be provided after PATCH but they should be ignored. If these 3 parts are not decimal values, an exception with the message "Error occured while parsing version!" should be thrown. If the initial version is not provided or is an empty string, use "0.0.1" by default.

// This class should support the following methods, all of which should be chainable (except release):

// major() - increase MAJOR by 1, set MINOR and PATCH to 0
// minor() - increase MINOR by 1, set PATCH to 0
// patch() - increase PATCH by 1
// rollback() - return the MAJOR, MINOR, and PATCH to their values before the previous major/minor/patch call, or throw an exception with the message "Cannot rollback!" if there's no version to roll back to. Multiple calls to rollback() should be possible and restore the version history
// release() - return a string in the format "{MAJOR}.{MINOR}.{PATCH}"
// May the binary force be with you!

function vm($initialVersion = "0.0.1") {
    $currentVersion = parseVersion($initialVersion);
    $versionHistory = [clone $currentVersion];

    // Funzione per parsare la versione e assicurarsi che sia corretta
    function parseVersion($version) {
        if (!$version) {
            $version = "0.0.1";
        }

        $parts = explode('.', $version);
        
        // Verifica se le parti della versione sono valide (solo numeri)
        if (count($parts) < 1 || !ctype_digit($parts[0]) ||
            (isset($parts[1]) && !ctype_digit($parts[1])) ||
            (isset($parts[2]) && !ctype_digit($parts[2]))) {
            throw new Exception("Error occured while parsing version!");
        }

        return (object)[
            'major' => intval($parts[0]),
            'minor' => isset($parts[1]) ? intval($parts[1]) : 0,
            'patch' => isset($parts[2]) ? intval($parts[2]) : 0,
        ];
    }

    // Aggiorna lo storico delle versioni
    function updateHistory(&$history, $version) {
        $history[] = clone $version;
    }

    // Restituisce un oggetto con le funzioni richieste
    return new class($currentVersion, $versionHistory) {
        private $currentVersion;
        private $versionHistory;

        public function __construct(&$currentVersion, &$versionHistory) {
            $this->currentVersion = $currentVersion;
            $this->versionHistory = $versionHistory;
        }

        public function major() {
            updateHistory($this->versionHistory, $this->currentVersion);
            $this->currentVersion->major += 1;
            $this->currentVersion->minor = 0;
            $this->currentVersion->patch = 0;
            return $this;
        }

        public function minor() {
            updateHistory($this->versionHistory, $this->currentVersion);
            $this->currentVersion->minor += 1;
            $this->currentVersion->patch = 0;
            return $this;
        }

        public function patch() {
            updateHistory($this->versionHistory, $this->currentVersion);
            $this->currentVersion->patch += 1;
            return $this;
        }

        public function rollback() {
            if (count($this->versionHistory) <= 1) {
                throw new Exception("Cannot rollback!");
            }
            array_pop($this->versionHistory);
            $this->currentVersion = end($this->versionHistory);
            return $this;
        }

        public function release() {
            return $this->currentVersion->major . '.' .
                   $this->currentVersion->minor . '.' .
                   $this->currentVersion->patch;
        }
    };
}

// FOURTH KATA

// The code provided is supposed replace all the dots . in the specified String str with dashes -

// But it's not working properly.

// Task
// Fix the bug so we can all go home early.

// Notes
// String str will never be null.


function replaceDots($str) {
    return str_replace('.', '-', $str);
}

var_dump(replaceDots("one.two.three"));

print_r(replaceDots("one.two.four.gigabits"));
