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
        Schema::create('undangans', function (Blueprint $table) {
            $table->id();
            $table->string('asal_surat');
            $table->string('nomor_surat');
            $table->string('tanggal_surat');
            $table->string('perihal');
            $table->enum('kasubbag_umum',['Konfirmasi','Belum Konfirmasi'])->default('Belum Konfirmasi');
            $table->date('verified_kasubbag_umum')->nullable();
            $table->enum('sekban',['Konfirmasi','Belum Konfirmasi'])->default('Belum Konfirmasi');
            $table->date('verified_sekban')->nullable();
            $table->enum('kaban',['Konfirmasi','Belum Konfirmasi'])->default('Belum Konfirmasi');
            $table->date('verified_kaban')->nullable();
            $table->string('to_kasubbag')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('undangans');
    }
};