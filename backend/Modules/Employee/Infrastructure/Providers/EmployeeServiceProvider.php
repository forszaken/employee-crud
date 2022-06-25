<?php

namespace Modules\Employee\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Employee\Application\Repository\EmployeeReadRepository;
use Modules\Employee\Application\Repository\EmployeeRepository;
use Modules\Employee\Domain\Repository\EmployeeReadRepositoryInterface;
use Modules\Employee\Domain\Repository\EmployeeRepositoryInterface;

class EmployeeServiceProvider extends ServiceProvider
{
    public function getModuleName(): string
    {
        return 'Employee';
    }

    public function getModuleNamespace(): string
    {
        return 'Modules\Employee\Infrastructure\Providers';
    }

    public function register(): void
    {
        $this->loadMigrationsFrom($this->getModulePath() . DIRECTORY_SEPARATOR . 'Migration');
        $this->app->bind(EmployeeReadRepositoryInterface::class, EmployeeReadRepository::class);
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
    }

    protected function getModulePath(): string
    {
        return base_path() . DIRECTORY_SEPARATOR . str_replace('\\', '/', static::getModuleNamespace());
    }
}
