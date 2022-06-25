<?php

namespace Modules\Employee\Application\Exceptions;

class EmployeeNotFoundException
{
    public function __construct(array $errors = [], int $statusCode = 404)
    {
        parent::__construct(__('Сотрудник не найден'), $errors, $statusCode);
    }
}
