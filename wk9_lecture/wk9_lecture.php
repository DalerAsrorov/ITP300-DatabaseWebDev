<?php
/**
 * Created by PhpStorm.
 * User: daler
 * Date: 10/22/15
 * Time: 2:11 PM
 */

class Person {
    // Class attributes and methods
    private $name = "Trojan";
    private $age = "21";

    public function getName() {
        return $this->name;
    }
    public function getAge() {
        return $this->age;
    }
    public function setName($newName) {
        $this->name = $newName;
    }
    public function setAge($newAge) {
        $this->age = $newAge;
    }
    public function setNameAndAge($nName, $nAge) {
        $this->name = $nName;
        $this->age = $nAge;
    }
}

$tommy = new Person;

echo $tommy->getName();
echo "<br>";
echo $tommy->getAge();

$tommy->setName("Daler");
$tommy->setAge(25);

echo"<br> New Name: ";
echo $tommy->getName();

echo "<br> New age: ";

echo $tommy->getAge();

echo "<br><br>";
$tommy->setNameAndAge("Not TOmmy", 100);
echo "Age: " . $tommy->getAge() . ". Name: " . $tommy->getName();