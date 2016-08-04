<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlideshowImageToCamperImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('camper_images', function (Blueprint $table) {
            $table->string('slideshow_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('camper_images', function (Blueprint $table) {
            $table->dropColumn('slideshow_image');
        });
    }
}
