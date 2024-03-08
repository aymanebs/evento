<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::where('name','Admin')->firstOrFail()->permissions()->sync('1');
        Role::where('name','Organiser')->firstOrFail()->permissions()->sync('2');
    }
}
