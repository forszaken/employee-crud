<?php

namespace Modules\Employee\Application\Repository;

use Modules\Employee\Application\Model\Populator\EmployeeModelPopulator;
use Modules\Employee\Domain\Model\Employee;
use Modules\Employee\Application\Model\Employee as EmployeeModel;
use Modules\Employee\Domain\Repository\EmployeeRepositoryInterface;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function create(Employee $employee): void
    {
        $employeeModel = new EmployeeModel();
        EmployeeModelPopulator::store($employeeModel, $employee);
        $employeeModel->save();
    }

    public function update(Employee $employee): void
    {
        $employeeModel = EmployeeModel::where('uuid', $employee->getUuid())->first();
        EmployeeModelPopulator::store($employeeModel, $employee);
        $employeeModel->save();
    }

    public function delete(Employee $employee): void
    {
        EmployeeModel::where('uuid', $employee->getUuid())->delete();
    }
}
