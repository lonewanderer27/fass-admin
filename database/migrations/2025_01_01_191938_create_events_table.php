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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('location');
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->integer('max_attendees');
            $table->string('avatar_url')->nullable();
            $table->string('cover_url')->nullable();
            $table->foreignId('organizer_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('creator_member_id')
                ->constrained('organizer_members')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
