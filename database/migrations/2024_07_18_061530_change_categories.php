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
        Schema::table('categories', function (Blueprint $table) {
           
            // chèn thêm 1 cột vào sau category_id
            $table->string('urlCategory')->after('description');
            $table->string('keywords')->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('urlCategory');
            $table->dropColumn('keywords');
        });
        //
    }
};