<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaktureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fakture', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('dete_id')->index('fk_fakture_deca1_idx');
            $table->integer('mesec_id')->index('fk_fakture_meseci1_idx');
            $table->integer('godina_id')->index('fk_fakture_godine1_idx');
            $table->decimal('iznos', 10);
            $table->decimal('placeno', 10)->nullable();
            $table->string("broj_fakture", 20)->nullable();
            $table->string("putanja", 255)->nullable();
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
        Schema::dropIfExists('fakture');
    }
}
