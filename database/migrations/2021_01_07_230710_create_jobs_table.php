<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->BigInteger('salary');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('jobs')->insert(
            array(
                ['name' => 'Gerente General', 'salary' => 200000],
                ['name' => 'Gerente Sucursal', 'salary' => 80000],
                ['name' => 'Contable', 'salary' => 30000],
                ['name' => 'Vendedor', 'salary' => 30000],
                ['name' => 'Mensajero', 'salary' => 13000],
                ['name' => 'Seguridad', 'salary' => 10000],
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
        Schema::dropIfExists('jobs');
    }
}
