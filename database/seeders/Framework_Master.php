<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class Framework_Master extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $framework = array(
        	array('id'=> 1, "framework_name" =>'PHP'),
        	array('id'=> 2, "framework_name" =>'Laravel'),
        	array('id'=> 3, "framework_name" =>'JQuery'),
        	array('id'=> 4, "framework_name" =>'JavaScript'),
        );
        DB::table('framework_master')->insert($framework);
    }
}
