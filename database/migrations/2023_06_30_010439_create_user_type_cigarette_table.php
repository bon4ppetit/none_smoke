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
        Schema::create('user_type_cigarette', function (Blueprint $table) {
            $table->id();

            $table->integer('money_on_pack_cigarette');
            $table->integer('count_cigarettes_in_pack');
            $table->integer('count_smoke_cigarettes_a_day');
            $table->integer('nicotine_in_cigarette');
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
        Schema::dropIfExists('user_type_cigarette');
    }
};
