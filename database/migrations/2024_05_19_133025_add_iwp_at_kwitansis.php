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
        Schema::table('kwitansis', function (Blueprint $table) {
            $table->integer('iwp1')->after('nilai')->nullable();
            $table->integer('iwp8')->after('iwp1')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kwitansis', function (Blueprint $table) {
            $table->dropColumn('iwp1');
            $table->dropColumn('iwp8');
        });
    }
};
