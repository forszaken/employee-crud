# Employee-модуль
Миграции которые нужно запустить:
```
php artisan migrate --path=/Modules/Employee/Infrastructure/Migration
```
Есть сидеры для добавления рандомных сотрудников, запускаются:
```
php artisan db:seed --class="Modules\Employee\Infrastructure\Seeders\EmployeeSeeder"
```
