<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('des_despesa', function (Blueprint $table) {
            $table->id( 'des_id');
            $table->string('des_descricao');
            $table->unsignedBigInteger('cat_id');
            $table->decimal('des_valor', 10,2);
            $table->date('des_data');
            $table->timestamps();

            $table->foreign('cat_id')->references('cat_id')->on('cat_categoria');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('despesas');
    }
};
