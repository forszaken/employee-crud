<?php

namespace Modules\Employee\Domain\Model;

class EmployeeCollection
{
    /** @var Employee[] */
    private array $items =  [];

    /**
     * @param Employee[] $items
     */
    public function __construct(array $items = [])
    {
        $this->setItems($items);
    }

    private function setItems(array $items): void
    {
        foreach ($items as $item) {
            $this->add($item);
        }
    }

    public function add(Employee $employee): void
    {
        foreach ($this->items as $item) {
            if ($item->isEqualsTo($employee)) {
                return;
            }
        }
        $this->items[] = $employee;
    }

    /**
     * @return Employee[]
     */
    public function all(): array
    {
        return $this->items;
    }

    public function remove(Employee $employee): void
    {
        $newList = [];
        foreach ($this->items as $item) {
            if ($item->isEqualsTo($employee)) {
                continue;
            }
            $newList[] = $item;
        }
        $this->items = $newList;
    }
}
