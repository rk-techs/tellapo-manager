<?php

namespace Database\Seeders;

use App\Models\CallHistory;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CallHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CallHistory::factory(30)->create([
            'company_id' => function() {
                return Company::inRandomOrder()->first()->id;
            },
            'employee_id' => function() {
                return Employee::inRandomOrder()->first()->id;
            },
        ]);
    }
}
