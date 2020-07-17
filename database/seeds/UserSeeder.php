<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'Admin',
        'user_role_id' => '2',
        'email' => 'admin@admin.com',
        'password' => '981014',
        'created_at' => today(), 
        'updated_at' => today() 
      ]
      );
    }
}
