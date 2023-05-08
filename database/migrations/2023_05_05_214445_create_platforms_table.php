<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('platforms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coin_id');
            $table->string('slug');
            $table->string('name');
            $table->string('address');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
            // We should not use address as unique identifier as one coin can have same address on different platforms/blockchains
            $table->unique(['coin_id', 'slug']);
            $table->index(['name', 'slug', 'address']);
        });
    }

    public function down() {
        Schema::dropIfExists('platforms');
    }
};
