<?php

namespace Modules\Employee\Application\Repository;

use Modules\Employee\Domain\Repository\EmployeeReadRepositoryInterface;
use Modules\Employee\Application\Factory\Domain\EmployeeFactory;
use Modules\Employee\Domain\Model\Employee;
use Modules\Employee\Application\Model\Employee as EmployeeModel;
use Modules\Employee\Domain\Model\EmployeeCollection;

class EmployeeReadRepository implements EmployeeReadRepositoryInterface
{
    private EmployeeFactory $employeeFactory;

    public function __construct(
        EmployeeFactory $employeeFactory
    )
    {
        $this->employeeFactory = $employeeFactory;
    }

    public function getAll(): EmployeeCollection
    {
        $employeeModel = EmployeeModel::all();
        return $this->employeeFactory->getAllEmployee($employeeModel);
    }

    public function getByUuid(string $uuid): Employee
    {
        $employeeModel = EmployeeModel::query()
                ->where('uuid', $uuid)
                ->first();
        return $this->employeeFactory->createModelFromOrm($employeeModel);
    }
}
