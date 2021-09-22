<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNameToContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('abc', function (Blueprint $table) {
            $table->renameColumn('contact','name');
        });
        Schema::table('abc', function (Blueprint $table) {
            $table->string('name')->change();
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('abc', function (Blueprint $table) {
            //
        });
    }
}
