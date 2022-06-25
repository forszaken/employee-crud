<?php

namespace Modules\Employee\Application\Model\Populator;

use Modules\Employee\Application\Model\Employee as EmployeeModel;
use Modules\Employee\Domain\Model\Employee;

class EmployeeModelPopulator
{
    public static function store(EmployeeModel $employeeModel, Employee $employee): EmployeeModel
    {
        $employeeModel->uuid = $employee->getUuid();

        $employeeModel->name = $employee->getName()->getName();
        $employeeModel->surname = $employee->getName()->getSurname();
        $employeeModel->patronymic = $employee->getName()->getPatronymic();

        $employeeModel->salary = $employee->getSalary();
        $employeeModel->company = $employee->getCompany();
        $employeeModel->phone = $employee->getPhone()->getPhone();

        return $employeeModel;
    }
}
