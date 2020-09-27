<?php

use Illuminate\Database\Seeder;
use App\Collection;

class CollectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=1; $i <= 5; $i++){
           factory(Collection::class)->create();
        }
    }
}
