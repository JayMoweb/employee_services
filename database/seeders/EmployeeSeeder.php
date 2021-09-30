<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Faker\Factory;
use  Database\Seeders\randomElement;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  
        $faker = Factory::create();
    
        for ($i=0; $i < 5; $i++) { 
            
            DB::table('employee_salary')->insert([
                "employee_name"  => $faker->name(),
                "employee_salary1" =>$faker->numberBetween(10000, 15000),
                "employee_salary2" =>$faker->numberBetween(10000, 15000),
                "employee_salary3" =>$faker->numberBetween(10000,15000),
                "employee_salary4" =>$faker->numberBetween(10000,15000),
                "salary_types" => $faker->randomElement(["high", "Medium", "Average"]),
           ]);
        }
    }
}
