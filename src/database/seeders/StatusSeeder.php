<?php

namespace StatusActivityLog\Database\Seeders;

use Illuminate\Database\Seeder;
use StatusActivityLog\Models\Status;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Order' => [
                ['name' => 'Pending', 'code' => 'pending', 'is_default' => true, 'color' => 'warning'],
                ['name' => 'Confirmed', 'code' => 'confirmed', 'color' => 'success'],
                ['name' => 'Cancelled', 'code' => 'cancelled', 'color' => 'danger'],
            ],
            'User' => [
                ['name' => 'Active', 'code' => 'active', 'is_default' => true, 'color' => 'success'],
                ['name' => 'Suspended', 'code' => 'suspended', 'color' => 'danger'],
            ],
        ];

        foreach ($data as $module => $statuses) {
            foreach ($statuses as $s) {
                Status::updateOrCreate(
                    ['module' => $module, 'code' => $s['code']],
                    array_merge($s, ['module' => $module])
                );
            }
        }
    }
}
