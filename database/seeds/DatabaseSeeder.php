<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
        AccessorySeeder::class,
        BlogCategorySeeder::class,
        BlogSeeder::class,
        FaqSeeder::class,
        FlightSeeder::class,
        HomeSliderSeeder::class,
        PlayerDartsSeeder::class,
        PlayersSeeder::class,
        ProductSeeder::class,
        ShaftSeeder::class,
        SoftTipSeeder::class,
        SteelTipSeeder::class,
        SubCategorySeeder::class,
        TopCategorySeeder::class,
        UserRoleSeeder::class,
        UserSeeder::class,
      ]);
    }
}
