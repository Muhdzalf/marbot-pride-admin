<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKajianVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kajian_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->longText('description');
            $table->longText('benefit')->nullable();
            $table->string('poster_url')->nullable();
            $table->string('tag', 25)->nullable();
            $table->string('video_url');
            $table->bigInteger('tema_id')->nullable();
            $table->bigInteger('admin_id');
            $table->bigInteger('ustadz_id');

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
        Schema::dropIfExists('kajian_videos');
    }
}
