<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return new EmployeeResource(Employee::all());
    }

    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());

        return new EmployeeResource($employee);
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());

        return new EmployeeResource($employee);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->noContent();
    }
}
