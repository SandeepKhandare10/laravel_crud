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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->comment('Product name');
            $table->integer('qty')->comment('product quantity');
            $table->string('description', 200)->comment('Product description')->nullable();
            $table->decimal('price', 10, 2)->comment('Product price');
            $table->timestamps();
        });

    }

};
