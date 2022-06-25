<?php

namespace Modules\Employee\Application\Services\Employee;



use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Modules\Employee\Application\DTO\Employee\EmployeeDto;
use Modules\Employee\Application\DTO\Employee\EmployeeDtoCollection;
use Modules\Employee\Application\Factory\Domain\EmployeeFactory;
use Modules\Employee\Domain\Repository\EmployeeReadRepositoryInterface;
use Modules\Employee\Domain\Repository\EmployeeRepositoryInterface;

class EmployeeService
{
    protected EmployeeReadRepositoryInterface $employeeReadRepository;
    protected EmployeeRepositoryInterface $employeeRepository;
    protected EmployeeFactory $employeeFactory;

    public function __construct(
        EmployeeReadRepositoryInterface $employeeReadRepository,
        EmployeeRepositoryInterface $employeeRepository,
        EmployeeFactory $employeeFactory
    ) {
        $this->employeeReadRepository = $employeeReadRepository;
        $this->employeeRepository = $employeeRepository;
        $this->employeeFactory = $employeeFactory;
    }

    public function getList(): EmployeeDtoCollection
    {
        $employeeCollection = $this->employeeReadRepository->getAll();
        return new EmployeeDtoCollection($employeeCollection);
    }

    public function getByUuid(string $uuid): EmployeeDto
    {
        return new EmployeeDto($this->employeeReadRepository->getByUuid($uuid));
    }

    public function create(StoreEmployeeRequest $form): EmployeeDto
    {
        $employeeDomain = $this->employeeFactory->createDomainModelFromRequest($form);
        $this->employeeRepository->create($employeeDomain);
        return new EmployeeDto($employeeDomain);
    }

    public function update(UpdateEmployeeRequest $request, string $uuid): EmployeeDto
    {
        $employeeDomain = $this->employeeFactory->createDomainModelFromUpdateRequest($request, $uuid);
        $this->employeeRepository->update($employeeDomain);
        return new EmployeeDto($employeeDomain);
    }

    public function delete(string $uuid): EmployeeDto
    {
        $employee = $this->employeeReadRepository->getByUuid($uuid);
        $this->employeeRepository->delete($employee);

        return new EmployeeDto($employee);
    }
}
