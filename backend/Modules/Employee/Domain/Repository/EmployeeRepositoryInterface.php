<?php

namespace Modules\Employee\Domain\Repository;

use Modules\Employee\Domain\Model\Employee;

interface EmployeeRepositoryInterface
{
    public function create(Employee $employee): void;
    public function update(Employee $employee): void;
    public function delete(Employee $employee): void;
}
