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
        Schema::create('coffee_drinks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('price');
            $table->float('discount')->default(0);
            $table->integer('rank');
            $table->text('description');
            $table->string('image');
            $table->unsignedBigInteger('created_by')->default(1); // Default value (ensure user ID 1 exists)
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set default');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffee_drinks');
    }
};
