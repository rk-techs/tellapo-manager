<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Employee::count() > 0) {
            $this->command->info('既にレコードが存在するためEmployeeSeederをスキップしました。');
            return;
        }

        foreach (User::all() as $user) {
            Employee::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
