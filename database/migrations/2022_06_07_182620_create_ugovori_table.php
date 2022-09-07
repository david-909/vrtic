<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUgovoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ugovori', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('dete_id')->index('fk_ugovori_deca_idx');
            $table->string('broj_ugovora', 10);
            $table->string('ime_nosioca', 45);
            $table->string('prezime_nosioca', 45);
            $table->string('broj_licne_karte', 9);
            $table->tinyInteger('active');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ugovori');
    }
}
