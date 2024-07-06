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
        Schema::create('nota_dinas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nomor_surat');
            $table->string('perihal');
            $table->string('tujuan');
            $table->string('bidang');
            $table->enum('kasubbag_umum',['Konfirmasi','Belum Konfirmasi'])->default('Belum Konfirmasi');
            $table->date('verified_kasubbag_umum')->nullable();
            $table->enum('sekban',['Konfirmasi','Belum Konfirmasi'])->default('Belum Konfirmasi');
            $table->date('verified_sekban')->nullable();
            $table->enum('kaban',['Konfirmasi','Belum Konfirmasi'])->default('Belum Konfirmasi');
            $table->date('verified_kaban')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_dinas');
    }
};