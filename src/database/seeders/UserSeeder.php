<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::count() > 0) {
            $this->command->info('既にレコードが存在するためUserSeederをスキップしました。');
            return;
        }

        $password = Hash::make('testpass');
        User::factory()->create([
            'name' => 'Admin User',
            'password' => $password,
            'permission_id' => Permission::where('name', 'admin')->first()->id,
        ]);
        User::factory()->create([
            'name' => 'Approver User',
            'password' => $password,
            'permission_id' => Permission::where('name', 'approver')->first()->id,
        ]);
        User::factory()->create([
            'name' => 'Staff User',
            'password' => $password,
            'permission_id' => Permission::where('name', 'staff')->first()->id,
        ]);

        User::factory(30)->create();
    }
}
