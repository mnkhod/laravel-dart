<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('user_roles')->insert([
        ['name' => 'Admin',
        'created_at' => today(), 
        'updated_at' => today() ],
        ['name' => 'User',
        'created_at' => today(), 
        'updated_at' => today() ],
      ]);
    }
}
