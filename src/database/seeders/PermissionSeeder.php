<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('permissions')->count() > 0) {
            $this->command->info('既にレコードが存在するためPermissionSeederをスキップしました。');
            return;
        }

        $permissions = [
            ['level' => 1, 'name' => 'admin', 'display_name' => '管理者', 'created_at' => now()],
            ['level' => 2, 'name' => 'approver', 'display_name' => '承認者', 'created_at' => now()],
            ['level' => 3, 'name' => 'staff', 'display_name' => '担当者', 'created_at' => now()],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
