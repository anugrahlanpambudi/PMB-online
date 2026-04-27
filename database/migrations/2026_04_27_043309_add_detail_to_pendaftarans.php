<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {

            $table->text('alamat_ktp')->nullable();
            $table->text('alamat_sekarang')->nullable();

            $table->string('kecamatan')->nullable();
            $table->unsignedBigInteger('kabupaten_id')->nullable();
            $table->unsignedBigInteger('provinsi_id')->nullable();

            $table->string('telp')->nullable();

            $table->enum('kewarganegaraan',['WNI Asli','WNI Keturunan','WNA'])->nullable();

            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();

            $table->enum('jenis_kelamin',['Pria','Wanita'])->nullable();
            $table->enum('status',['Belum menikah','Menikah','Lainnya'])->nullable();

            $table->unsignedBigInteger('agama_id')->nullable();

            $table->string('foto')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->dropColumn([
                'alamat_ktp','alamat_sekarang','kecamatan',
                'kabupaten_id','provinsi_id','telp',
                'kewarganegaraan','tanggal_lahir',
                'tempat_lahir','jenis_kelamin','status',
                'agama_id','foto'
            ]);
        });
    }
};

