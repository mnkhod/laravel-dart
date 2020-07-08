<?php

use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('blog_categories')->insert([
        ['name' => 'Мэдээ',
        'created_at' => today(), 
        'updated_at' => today()],
        ['name' => 'Нийтлэл',
        'created_at' => today(), 
        'updated_at' => today()],
      ]);
    }
}
