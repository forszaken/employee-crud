<?php

namespace Modules\Employee\Domain\ValueObject;

class Name
{
    private string $name;
    private string $surname;
    private string $patronymic = '';

    public function __construct(string $name, string $surname, string $patronymic = '')
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->patronymic = $patronymic;
    }

    public function getFullName(): string
    {
        $list = [$this->name, $this->surname];
        if ($this->patronymic) {
            $list[] = $this->patronymic;
        }
        return implode(" ", $list);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getPatronymic(): string
    {
        return $this->patronymic;
    }
}
