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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('tps_id')->nullable()->after('roles');
            $table->unsignedBigInteger('desa_id')->nullable()->after('tps_id');
            $table->foreign('tps_id')->references('id')->on('tps')->onDelete('set null');
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('tps_id', 'desa_id');
        });
    }
};
