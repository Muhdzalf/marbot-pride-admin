<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateKajianThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kajian_themes', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->longText('description');
            $table->string('poster_url')->nullable();
            $table->string('tag', 25)->nullable();
            $table->bigInteger('admin_id');
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
        Schema::dropIfExists('kajian_themes');
    }
}
