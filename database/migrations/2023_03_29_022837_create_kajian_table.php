<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKajianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kajian', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->longText('description');
            $table->longText('benefit')->nullable();
            $table->string('poster_url')->nullable();
            $table->string('tag', 25)->nullable();
            $table->string('video_url');

            // Foreign key to tema_id
            $table->unsignedbigInteger('tema_id')->nullable();
            $table->foreign('tema_id')->on('tema')->references('id')->nullOnDelete()->cascadeOnUpdate();

            // Foreign key to ustadz_id
            $table->unsignedbigInteger('ustadz_id');
            $table->foreign('ustadz_id')->on('ustadzs')->references('id')->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('kajian');
    }
}
