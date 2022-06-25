<?php

namespace Modules\Employee\Application\Factory\Domain;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Database\Eloquent\Collection;
use Modules\Employee\Domain\Model\Employee;
use Modules\Employee\Domain\ValueObject\Name;
use Modules\Employee\Domain\ValueObject\Phone;
use Modules\Employee\Domain\Model\EmployeeCollection;
use Modules\Employee\Application\Model\Employee as EmployeeModel;
use Ramsey\Uuid\Uuid;

class EmployeeFactory
{
    public function createDomainModelFromRequest(StoreEmployeeRequest $form): Employee
    {
        $name = new Name($form->name, $form->surname, $form->patronymic ?: '');
        $phone = new Phone($form->phone);

        return new Employee(
            Uuid::uuid4(),
            $name,
            $form->salary,
            $phone,
            $form->company
        );
    }

    public function createDomainModelFromUpdateRequest(UpdateEmployeeRequest $form, string $uuid): Employee
    {
        $name = new Name($form->name, $form->surname, $form->patronymic ?: '');
        $phone = new Phone($form->phone);

        return new Employee(
            $uuid,
            $name,
            $form->salary,
            $phone,
            $form->company
        );
    }

    public function createModelFromOrm(EmployeeModel $employeeModel): Employee
    {
        $name = new Name($employeeModel->name, $employeeModel->surname, $employeeModel->patronymic ?: '');
        $phone = new Phone($employeeModel->phone);


        return new Employee(
            $employeeModel->uuid,
            $name,
            $employeeModel->salary,
            $phone,
            $employeeModel->company
        );
    }

    public function getAllEmployee(Collection $employeeList): EmployeeCollection
    {
        return $this->convertToEmployeeCollection($employeeList);
    }

    private function convertToEmployeeCollection(Collection $employees): EmployeeCollection
    {
        $collection = new EmployeeCollection();
        foreach ($employees->all() as $employeeModel) {
            $employee = $this->createModelFromOrm($employeeModel);

            $collection->add($employee);
        }
        return $collection;
    }
}
