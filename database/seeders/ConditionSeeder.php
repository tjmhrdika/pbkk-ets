<?php

namespace Database\Seeders;

use App\Models\Condition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conditions = [[
            'condition' => 'Baik'
        ], [
            'condition' => 'Layak'
        ], [
            'condition' => 'Rusak'
        ]];

        foreach($conditions as $condition)
        {
            Condition::create($condition);
        }
    }
}
