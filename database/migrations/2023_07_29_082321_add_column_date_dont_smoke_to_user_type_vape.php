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
        Schema::table('user_type_vape', function (Blueprint $table) {
            $table->timestamp('date_dont_smoke')->after('user_id')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_type_vape', function (Blueprint $table) {
            $table->dropColumn('date_dont_smoke');
        });
    }
};
