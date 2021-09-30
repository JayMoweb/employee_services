<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('users')->delete();
        $admin = array(

        	"firstname" => 'jay',
        	"lastname"  => 'gohel',
        	"email"		=> 'jay@moweb.com',
        	"password"	=> Hash::make('jay@1234'),
        	"role"		=> 'admin',
            "status"    =>'0',
            "image"     =>'',   
        );
        DB::table('users')->insert($admin);
    }
}
