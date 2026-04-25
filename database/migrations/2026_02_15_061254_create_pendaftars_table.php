<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->integer('umur');
            $table->string('no_hp');
            $table->string('email');
            $table->enum('layanan', ['pemula', 'lanjutan', 'atlet', 'privat']);
            $table->text('catatan')->nullable();
            $table->date('tanggal_mendaftar');
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};

