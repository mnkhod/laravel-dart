<?php

use Illuminate\Database\Seeder;

class TopCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('top_categories')->insert([
        ['name' => 'Accessories',
        'created_at' => today(), 
        'updated_at' => today() ],
        ['name' => 'Steel Tip',
        'created_at' => today(), 
        'updated_at' => today() ],
        ['name' => 'Soft Tip',
        'created_at' => today(), 
        'updated_at' => today() ],
        ['name' => 'Flight',
        'created_at' => today(), 
        'updated_at' => today() ],
        ['name' => 'Shaft',
        'created_at' => today(), 
        'updated_at' => today() ],
        ['name' => 'Player Dart',
        'created_at' => today(), 
        'updated_at' => today() ],
      ]); 
    }
}
