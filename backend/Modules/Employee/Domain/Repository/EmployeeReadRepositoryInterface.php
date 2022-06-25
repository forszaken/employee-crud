<?php

namespace Modules\Employee\Domain\Repository;

use Modules\Employee\Domain\Model\EmployeeCollection;

interface EmployeeReadRepositoryInterface
{
    public function getAll(): EmployeeCollection;
}
