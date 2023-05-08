<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_actives', function (Blueprint $table) {
            $table->id();
            $table->float('target', 10, 2);
            $table->float('reale', 10, 2);
            $table->float('nb_activation', 10, 2);
            $table->float('build_up', 10, 2);
            $table->date('date')->nullable();
            $table->unsignedBigInteger('id_vendeur');
            $table->unsignedBigInteger('id_category');
            $table->timestamps();

            $table->foreign('id_vendeur')->references('id')->on('vendeurs');
            $table->foreign('id_category')->references('id')->on('categories');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_actives');
    }
};
