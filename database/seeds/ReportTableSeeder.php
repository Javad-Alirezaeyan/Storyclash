<?php

use Illuminate\Database\Seeder;

use App\Report;

class ReportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=1; $i <= 10; $i++){
            factory(Report::class)->create();
        }
    }
}
