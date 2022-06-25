<?php

namespace Modules\Employee\Domain\Model;

use Modules\Employee\Domain\ValueObject\Name;
use Modules\Employee\Domain\ValueObject\Phone;

class Employee
{
    private string $uuid;
    private Name $name;
    private string $salary;
    private Phone $phone;
    private string $company;

    public function __construct(string $uuid, Name $name, string $salary, Phone $phone, string $company)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->salary = $salary;
        $this->phone = $phone;
        $this->company = $company;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->name->getSurname();
    }

    public function getPatronymic(): ?string
    {
        return $this->name->getPatronymic();
    }

    public function getFullName(): string
    {
        return $this->getName()->getFullName();
    }

    public function getPhone(): ?Phone
    {
        return $this->phone;
    }

    public function setPhone(Phone $phone): void
    {
        $this->phone = $phone;
    }

    public function getSalary(): string
    {
        return $this->salary;
    }

    public function setSalary(string $salary): void
    {
        $this->salary = $salary;
    }

    public function getCompany(): string
    {
        return $this->company;
    }

    public function setCompany(string $company): void
    {
        $this->company = $company;
    }

    public function isEqualsTo(Employee $employee): bool
    {
        return $this->getUuid() === $employee->getUuid();
    }
}
