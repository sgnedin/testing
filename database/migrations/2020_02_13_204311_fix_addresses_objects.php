<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixAddressesObjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('addres', function(Blueprint $table) {
        //     $table->string('user_id')->after('id');
        // });

        // Schema::table('objects', function(Blueprint $table) {
        //     $table->dropColumn(['arrival_date', 'last_service_date']);
        // });

        // Schema::table('objects', function(Blueprint $table) {
        //     $table->string('addres_id')->after('id');
        //     $table->date('arrival_date')->after('active_cost');
        //     $table->date('last_service_date')->after('arrival_date');
        //     $table->integer('brand_id')->after('name');
        // });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('addres', function(Blueprint $table) {
        //     $table->dropColumn('user_id');
        // });

        // Schema::table('objects', function(Blueprint $table) {
        //     $table->dropColumn('addres_id');
        // });
    }
}
