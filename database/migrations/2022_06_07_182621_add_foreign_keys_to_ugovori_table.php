<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUgovoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ugovori', function (Blueprint $table) {
            $table->foreign(['dete_id'], 'fk_ugovori_deca')->references(['id'])->on('deca')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ugovori', function (Blueprint $table) {
            $table->dropForeign('fk_ugovori_deca');
        });
    }
}
