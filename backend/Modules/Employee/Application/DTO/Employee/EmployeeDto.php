<?php

namespace Modules\Employee\Application\DTO\Employee;

use Modules\Employee\Domain\Model\Employee;

class EmployeeDto
{
    public string $uuid;
    public string $name = '';
    public string $surname = '';
    public ?string $patronymic = '';
    public ?string $fullname = '';

    public string $salary;
    public string $phone;
    public string $company;


    public function __construct(Employee $employee)
    {
        $this->uuid = $employee->getUuid();

        $person = $employee->getName();
        $phone = $employee->getPhone();

        $this->name = $person->getName();
        $this->surname = $person->getSurname();
        $this->patronymic = $person->getPatronymic();
        $this->fullname = $person->getFullName();

        $this->phone = $phone->getPhone();
        $this->salary = $employee->getSalary();
        $this->company = $employee->getCompany();
    }
}
