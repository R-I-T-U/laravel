<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('updated_by');
            $table->string('website_name',100);
            $table->string('slogan')->nullable();
            $table->string('logo');
            $table->string('favicon');
            $table->string('header_logo')->nullable();
            $table->text('address');
            $table->string('email');
            $table->string('facebook_link')->nullable();
            $table->string('insta_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->text('about_website')->nullable();
            $table->string('feature_image')->nullable();

            $table->timestamps();

            $table->foreign('updated_by')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
