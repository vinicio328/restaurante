<?php

use Illuminate\Database\Seeder;
use App\User;
use Kodeine\Acl\Models\Eloquent\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(config('admin.admin_name')) {

            $role = new Role();
            $roleAdmin = $role->create([
                'name' => 'Administrator',
                'slug' => 'administrator',
                'description' => 'manage administration privileges'
            ]);

            $role = new Role();
            $roleCocinero = $role->create([
                'name' => 'Cocinero',
                'slug' => 'cocinero',
                'description' => 'manage cocinero privileges'
            ]);

            $role = new Role();
            $roleCajero = $role->create([
                'name' => 'Cajero',
                'slug' => 'cajero',
                'description' => 'manage cajero privileges'
            ]);

            $role = new Role();
            $roleMostrador = $role->create([
                'name' => 'Mostrador',
                'slug' => 'mostrador',
                'description' => 'manage mostrador privileges'
            ]);


            $user = User::firstOrCreate(
                ['email' => 'admin@example.com'], [
                    'name' => 'Administrador',
                    'password' => bcrypt('password'),
                ]
            );

            $user->assignRole($roleAdmin);

            $cocinero = User::firstOrCreate(
                ['email' => 'cocinero@example.com'], [
                    'name' => 'Cocinero',
                    'password' => bcrypt('password'),
                ]
            );

            $cocinero->assignRole($roleCocinero);

            $cajero = User::firstOrCreate(
                ['email' => 'cajero@example.com'], [
                    'name' => 'Cajero',
                    'password' => bcrypt('password'),
                ]
            );

            $cajero->assignRole($roleCajero);

            $mostrador = User::firstOrCreate(
                ['email' => 'mostrador@example.com'], [
                    'name' => 'Mostrador',
                    'password' => bcrypt('password'),
                ]
            );

            $mostrador->assignRole($roleMostrador);

        }
    }
} 