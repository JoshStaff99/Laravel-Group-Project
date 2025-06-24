<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Customer reference
            $table->decimal('subtotal', 10, 2)->default(0); // Product subtotal
            $table->decimal('vat_total', 10, 2)->default(0); // VAT value
            $table->decimal('total', 10, 2)->default(0); // Final total
            $table->enum('status', ['draft', 'sent', 'accepted'])->default('draft');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};