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
        // Schema::create('books', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('author_id');
        //     $table->string('category_id');
        //     $table->string('title');
        //     $table->string('description');
        //     $table->int('price');
        //     $table->string('status');
        //     $table->timestamps('created_at');
        //     $table->timestamps('updated_at');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Schema::dropIfExists('books');
    // }
};
