<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('pending');
            $table->integer('nominal');

            //foreign key to method
            $table->unsignedbigInteger('method_id');
            $table->foreign('method_id')->on('donation_methods')->references('id')->cascadeOnDelete()->cascadeOnUpdate();

            //foreign key to user_id
            $table->unsignedbigInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete()->cascadeOnUpdate();

            //foreign key to item
            $table->integer('itemable_id');
            $table->string('itemable_type', 30);

            $table->index(['itemable_id', 'itemable_type']);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
