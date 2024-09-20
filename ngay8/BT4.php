<?php
class Employee {
    private $name;
    private $age;
    private $position;

    public function __construct($name, $age, $position) {
        $this->name = $name;
        $this->age = $age;
        $this->position = $position;
    }

    public function getDetails() {
        return "Name: $this->name, Age: $this->age, Position: $this->position";
    }
}

class Manager extends Employee {
    private $employees = [];

    public function __construct($name, $age, $position) {
        parent::__construct($name, $age, $position);
    }

    public function addEmployee(Employee $employee) {
        $this->employees[] = $employee;
    }

    public function getTotalEmployees() {
        return count($this->employees);
    }

    public function showManagedEmployees() {
        foreach ($this->employees as $employee) {
            echo $employee->getDetails() . "<br>";
        }
    }
}

$manager = new Manager("Nguyen", 45, "Manager");
$employee1 = new Employee("Huy", 30, "Software Engineer");
$employee2 = new Employee("Hoang", 28, "Data Analyst");

$manager->addEmployee($employee1);
$manager->addEmployee($employee2);

echo $manager->getDetails() . "<br>";
echo "Total Employees under Manager: " . $manager->getTotalEmployees() . "<br>";
echo "Managed Employees: <br>" ;
$manager->showManagedEmployees();
?>
