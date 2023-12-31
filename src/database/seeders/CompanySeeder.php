<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyGroup;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory(50)->create([
            'employee_id' => function() {
                return Employee::inRandomOrder()->first()->id;
            },
            'company_group_id' => function() {
                return rand(0, 1) ? CompanyGroup::inRandomOrder()->first()->id : null;
            },
        ]);
    }
}
