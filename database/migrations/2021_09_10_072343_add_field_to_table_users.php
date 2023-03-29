<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class AddFieldToTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number', 13)->after('email');
            $table->longText('about')->after('email')->nullable();
            $table->date('birth_date')->after('email');
            $table->string('role', 15)->after('email')->default('user');
            $table->softDeletes();
        });

        Artisan::call('db:seed', [
            '--class' => UserSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_number', 'about', 'birth_date', 'role');
        });
    }
}
