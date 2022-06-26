<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Especie;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal', function (Blueprint $table) {
            $table->id();
            $table->string("nomeanimal", 100);
            $table->string("nomedono", 100);
            $table->string("raca", 50);
            $table->foreignFor (Especie::class);
            $table->foreign("especie_id")->references("id")->on("especie");
            $table->date("datanascimento");
            $table->integer("idade");
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
        Schema::dropIfExists('animal');
    }
};
