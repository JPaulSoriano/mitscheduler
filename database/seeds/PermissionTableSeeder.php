<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions = [
            'manage-user',
            'manage-role',
            'manage-department',
            'manage-specialization',
            'manage-curricula',
            'manage-building',
            'manage-section',
            'manage-schedule',
            'manage-load',
            'manage-timetable'
        ];
   
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}