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
         $this->call(UnitOfMeasureSeed::class);
         $this->call(ProductGroupSeed::class);
         $this->call(TypeOfProductSeed::class);
    }
}
