<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->morphs('payable');
            $table->decimal('amount', 12, 2);
            $table->string('currency', 3)->default('XOF');
            $table->enum('provider', ['orange_money', 'mtn_momo', 'wave']);
            $table->enum('status', ['pending', 'processing', 'success', 'failed', 'refunded'])->default('pending');
            $table->string('provider_reference')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
