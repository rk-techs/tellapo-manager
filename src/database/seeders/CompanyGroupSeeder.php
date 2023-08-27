<?php

namespace Database\Seeders;

use App\Models\CompanyGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (CompanyGroup::count() > 0) {
            $this->command->info('既にレコードが存在するためCompanyGroupSeederをスキップしました。');
            return;
        }

        $groups = [
            '企業Group A',
            '企業Group B',
            '企業Group C',
            '企業Group D',
            '企業Group E',
        ];

        foreach ($groups as $group) {
            CompanyGroup::create(['name' => $group]);
        }
    }
}
