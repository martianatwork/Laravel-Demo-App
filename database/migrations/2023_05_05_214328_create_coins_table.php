<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('coins', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('symbol');
            $table->string('name');
            // This should be present as well but as we are not getting the api response we are going to set it as zero
            $table->integer('decimals')->default(0);
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unique(['slug']);
            $table->index(['name', 'slug', 'symbol']);
        });
    }

    public function down() {
        Schema::dropIfExists('coins');
    }
};
