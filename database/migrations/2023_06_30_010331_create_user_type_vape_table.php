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
        Schema::create('user_type_vape', function (Blueprint $table) {
            $table->id();
            $table->integer('price_jar');
            $table->integer('count_jar_a_month');
            $table->integer('price_vape_vaporizer');
            $table->integer('count_vape_vaporizer_a_month');
            $table->date('date_start_smoke');
            $table->date('date_finish_smoke');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_type_vape');
    }
};
