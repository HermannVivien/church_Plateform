<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clergy', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('role', ['pretre', 'eveque', 'diacre', 'autre']);
            $table->text('bio')->nullable();
            $table->string('photo')->nullable();
            $table->string('parish')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clergy');
    }
};
