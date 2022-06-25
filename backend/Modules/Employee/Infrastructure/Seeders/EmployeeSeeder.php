<?php

namespace Modules\Employee\Infrastructure\Seeders;

use Faker\Factory as Faker;
use Faker\Generator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class EmployeeSeeder extends Seeder
{
    protected Generator $faker;

    public function __construct()
    {
        $this->faker = Faker::create();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insertOrIgnore([
            'uuid' => Uuid::uuid4(),
            'name' => $this->faker->name,
            'surname' => $this->faker->lastName,
            'patronymic' => $this->faker->userName,
            'salary' => $this->faker->randomNumber(),
            'phone' => $this->faker->phoneNumber,
            'company' => $this->faker->company
        ]);
    }
}
