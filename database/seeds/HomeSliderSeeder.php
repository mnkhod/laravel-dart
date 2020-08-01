<?php

use Illuminate\Database\Seeder;

class HomeSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('home_sliders')->insert([[
      'main_title' => 'Хоёрыг авбал нэг үнэгүй онцгой урамшуулал',
      'top_title' => 'Шинэ бараа ирлээ',
      'bot_title' => 'Энэ сарыг дуустал',
      'image' => 'img/photo-1579019163248-e7761241d85a.jpg',
      'btn_title' => 'Очиж үзэх',
      'btn_link' => '/admin/profile',
      'created_at' => today(), 
      'updated_at' => today() 
    ],[
      'main_title' => 'Гурвыг авбал нэг үнэгүй онцгой урамшуулал',
      'top_title' => 'Шинэ бараа ирлээ',
      'bot_title' => '8-р сарыг дуустал',
      'image' => 'img/photo-1582172958571-208b55ba4bab.jpg',
      'btn_title' => 'Сонирхох',
      'btn_link' => '/admin/chart',
      'created_at' => today(), 
      'updated_at' => today() 
    ],
    ]);
    }
}
