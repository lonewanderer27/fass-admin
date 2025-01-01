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
        Schema::create('organizer_member_invite_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organizer_id')->constrained()->onDelete('cascade');
            $table->string('invite_code')->unique();
            $table->enum('status', ['active', 'used', 'invalid'])->default('active');
            $table->timestamps();

            // Composite unique constraint
            $table->unique(['organizer_id', 'invite_code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizer_member_invite_codes');
    }
};
