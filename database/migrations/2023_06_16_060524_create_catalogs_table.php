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
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('penulis');
            $table->string('kategori');
            $table->string('kata_kunci')->nullable();
            $table->string('penerbit');
            $table->date('tahun');
            $table->enum('bahasa', ['Indonesia', 'Inggris', 'Arab'])->default('Indonesia');
            $table->enum('jenis', ['buku', 'jurnal', 'skripsi', 'tesis'])->default('buku');
            $table->integer('halaman');
            $table->string('hak_cipta');
            $table->string('isbn')->nullable();
            $table->enum('hak_akses', ['open-akses', 'private-akses'])->default('private-akses');
            $table->string('pdf');
            $table->string('flipbook');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogs');
    }
};
