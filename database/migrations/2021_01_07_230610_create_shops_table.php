<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('direction');
            $table->BigInteger('cellphone');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('shops')->insert(
            array(
                ['direction' => 'Santo Domingo', 'cellphone' => 8099188989],
                ['direction' => 'Santiago', 'cellphone' => 8099188989],
                ['direction' => 'Punta Cana', 'cellphone' => 8099188989],
                ['direction' => 'Puerto Plata', 'cellphone' => 8099188989],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
