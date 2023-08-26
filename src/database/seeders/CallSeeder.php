<?php

namespace Database\Seeders;

use App\Models\Call;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Call::factory(30)->create([
            'company_id' => function() {
                return Company::inRandomOrder()->first()->id;
            },
            'employee_id' => function() {
                return Employee::inRandomOrder()->first()->id;
            },
        ]);
    }
}
