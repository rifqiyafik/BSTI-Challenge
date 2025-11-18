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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // PRIMARY KEY

            $table->string('name');
            $table->string('brand');
            $table->text('description');

            $table->string('processor');
            $table->string('ram_gb');
            $table->string('storage_gb');
            $table->string('storage_type');

            $table->string('gpu')->nullable();

            $table->decimal('display_size_inch', 4, 1);
            $table->string('display_resolution'); // diperbaiki: 'display_reolution' -> 'display_resolution'

            $table->integer('price');
            $table->string('image')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
