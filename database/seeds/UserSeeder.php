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
      DB::table('users')->insert([[
        'name' => 'Munkh-Od Ganzorigt',
        'user_role_id' => '1',
        'email' => 'admin@admin.com',
        'password' => 'password',
        'created_at' => today(), 
        'updated_at' => today() 
      ],[
        'name' => 'Munkh-Zul Ganzorigt',
        'user_role_id' => '2',
        'email' => 'user@user.com',
        'password' => 'password',
        'created_at' => today(), 
        'updated_at' => today() 
      ],
      ]);

      factory(App\User::class,4)->create();
    }
}
