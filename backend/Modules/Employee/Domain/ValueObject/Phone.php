<?php

namespace Modules\Employee\Domain\ValueObject;

class Phone
{
    private string $phone;

    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }
}
