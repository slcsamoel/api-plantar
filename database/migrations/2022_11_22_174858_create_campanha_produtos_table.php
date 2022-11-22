<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campanha_produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campanha_id')->constrained('campanhas')->onDelete('cascade');
            $table->foreignId('produto_id')->constrained('produtos')->onDelete('cascade');
            $table->float('preco')->nullable();
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
        Schema::dropIfExists('campanha_produtos');
    }
};
