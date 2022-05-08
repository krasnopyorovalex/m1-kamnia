<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColorThemeIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('catalog_products', function (Blueprint $table) {
            $table->unsignedBigInteger('color_theme_id')->nullable()->after('catalog_id');

            $table->foreign('color_theme_id')->references('id')->on('our_services')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('catalog_products', function (Blueprint $table) {
            $table->dropForeign(['color_theme_id']);
            $table->dropColumn(['color_theme_id']);
        });
    }
}
