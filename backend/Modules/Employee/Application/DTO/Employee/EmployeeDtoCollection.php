<?php

namespace Modules\Employee\Application\DTO\Employee;

use Modules\Employee\Domain\Model\EmployeeCollection;

class EmployeeDtoCollection
{
    private array $items = [];

    public function __construct(EmployeeCollection $collection)
    {
        $this->init($collection);
    }

    private function init(EmployeeCollection $collection): void
    {
        foreach ($collection->all() as $employee) {
            $this->addItem(new EmployeeDto($employee));
        }
    }

    public function addItem(EmployeeDto $employeeDto): void
    {
        $this->items[] = $employeeDto;
    }

    /**
     * @return EmployeeDto[]
     */
    public function all(): array
    {
        return $this->items;
    }
}
