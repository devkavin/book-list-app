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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->decimal('price', 8, 2); // 8 digits in total, 2 after the decimal point
            $table->integer('stock');
            $table->timestamps();
            // constrained means that the book_category_id column is a foreign key that references the id column on the book_categories table \
            // (laravel will automatically determine the table name based on the model name)
            $table->foreignId('book_category_id')
                ->constrained()
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
