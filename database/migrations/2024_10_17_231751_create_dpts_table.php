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
        Schema::create('dpts', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama');
            $table->string('tl');
            $table->date('tgl_lahir')->nullable();
            $table->string('status')->nullable();
            $table->enum('jenkel', ['L', 'P'])->nullable();
            $table->text('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->boolean('disabilitas')->default(0);
            $table->enum('ektp', ['S', 'B'])->default('S');            $table->boolean('memilih')->default(0);
            $table->boolean('hadir')->default(0);
            $table->foreignId('tps_id')->constrained('tps')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dpts');
    }
};
