<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'First_Name' => 'Sarah', 
            'Last_Name' => 'Al Aradah', 
            'Address' => '16 Green Hill Road', 
            'Postcode' => 'LS12 3QA', 
            'Telephone_Number' => '07974033765', 
            'email' => 'noor2010@gmail.com',
            'password' => bcrypt('GrrenHouse99')
        ]);
    
       // $role = Role::create(['name' => 'Admin']);
        $role = Role::find(1);
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
