<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFaktureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fakture', function (Blueprint $table) {
            $table->foreign(['dete_id'], 'fk_fakture_deca1')->references(['id'])->on('deca')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['mesec_id'], 'fk_fakture_meseci1')->references(['id'])->on('meseci')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['godina_id'], 'fk_fakture_godine1')->references(['id'])->on('godine')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fakture', function (Blueprint $table) {
            $table->dropForeign('fk_fakture_deca1');
            $table->dropForeign('fk_fakture_meseci1');
            $table->dropForeign('fk_fakture_godine1');
        });
    }
}
