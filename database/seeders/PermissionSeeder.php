<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions=[

            ['name'=>'access-admin-dashboard'],
            ['name'=>'access-organiser-dashboard'],
        ];

        foreach($permissions as $permission){
            Permission::create($permission);
        }
    }
}
