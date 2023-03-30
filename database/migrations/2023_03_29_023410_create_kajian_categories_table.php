<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKajianCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kajian_categories', function (Blueprint $table) {
            $table->id();

            //foreign key to kajian
            $table->unsignedbigInteger('kajian_id');
            $table->foreign('kajian_id')->on('kajian')->references('id')->cascadeOnDelete()->cascadeOnUpdate();

            // foreign key to category
            $table->unsignedbigInteger('category_id');
            $table->foreign('category_id')->on('categories')->references('id')->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('kajian_categories');
    }
}
