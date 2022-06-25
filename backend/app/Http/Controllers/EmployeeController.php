<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use Modules\Employee\Application\Services\Employee\EmployeeService;

class EmployeeController
{
    private EmployeeService $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index()
    {
        return new EmployeeResource($this->employeeService->getList()->all());
    }

    public function show(string $uuid)
    {
        $employeeDto = $this->employeeService->getByUuid($uuid);

        return new EmployeeResource(get_object_vars($employeeDto));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = $this->employeeService->create($request);

        return new EmployeeResource(get_object_vars($employee));
    }

    public function update(string $uuid, UpdateEmployeeRequest $request)
    {
        $employee = $this->employeeService->update($request, $uuid);

        return new EmployeeResource(get_object_vars($employee));
    }

    public function destroy(string $uuid)
    {
        $this->employeeService->delete($uuid);

        return response()->noContent();
    }
}
