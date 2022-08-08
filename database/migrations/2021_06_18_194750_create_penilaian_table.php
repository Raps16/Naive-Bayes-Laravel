<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_prajurit')->nullable();
            $table->string('jenis_kelamin');
            $table->integer('nrp');
            $table->string('pangkat');
            $table->string('jabatan');
            $table->string('alamat');
            $table->string('kesatuan');
            $table->integer('lari_12mnt');
            $table->integer('sit_up');
            $table->integer('pull_up');
            $table->integer('push_up');
            $table->integer('lunges');
            $table->integer('shutllerun');
            $table->string('ket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian');
    }
}
