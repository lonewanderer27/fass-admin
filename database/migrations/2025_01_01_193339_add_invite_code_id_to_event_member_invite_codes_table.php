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
        Schema::table('event_members', function (Blueprint $table) {
            $table
                ->foreignId('invite_code_id')
                ->constrained('event_member_invite_codes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_members', function (Blueprint $table) {
            $table->dropForeign(['invite_code_id']);
            $table->dropColumn('invite_code_id');
        });
    }
};
