<?php

use Illuminate\Database\Seeder;
use App\AcademicYear;
class AcademicYearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcademicYear::create([
        	'name' => '2022',
        ]);
    }
}
