<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deca', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ime', 45);
            $table->string('prezime', 45);
            $table->char('jmbg', 13)->unique('jmbg_UNIQUE');
            $table->string('ime_roditelja', 45);
            $table->string('prezime_roditelja', 45);
            $table->char('broj_licne_karte', 9)->unique('broj_licne_karte_UNIQUE');
            $table->string('adresa', 100);
            $table->timestamp('created_at');
            $table->string('updated_at', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deca');
    }
}
