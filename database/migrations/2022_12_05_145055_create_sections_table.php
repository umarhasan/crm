<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->integer('page_id')->nullable();
            $table->string('section_name')->nullable();
            $table->longText('slider_content_1')->nullable();
            $table->longText('slider_content_2')->nullable();
            $table->longText('slider_content_3')->nullable();
            $table->text('video_url')->nullable();
            $table->string('icon_title_1')->nullable();
            $table->string('icon_title_2')->nullable();
            $table->string('icon_title_3')->nullable();
            $table->text('icon_text_1')->nullable();
            $table->text('icon_text_2')->nullable();
            $table->text('icon_text_3')->nullable();
            $table->string('section_title')->nullable();
            $table->string('bullet_heading_1')->nullable();
            $table->string('bullet_heading_2')->nullable();
            $table->string('bullet_heading_3')->nullable();
            $table->text('bullet_text_1')->nullable();
            $table->text('bullet_text_2')->nullable();
            $table->text('bullet_text_3')->nullable();
            $table->text('bottam_para')->nullable();
            $table->text('copyright_text')->nullable();
            $table->text('logo')->nullable();
            $table->text('slider_image')->nullable();
            $table->text('slider_video')->nullable();
            $table->text('right_image')->nullable();
            $table->text('left_image')->nullable();
            $table->text('icon_image_1')->nullable();
            $table->text('icon_image_2')->nullable();
            $table->text('icon_image_3')->nullable();
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
        Schema::dropIfExists('sections');
    }
};
