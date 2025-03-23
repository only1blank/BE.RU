<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('tracking_id')->nullable()->change(); // Разрешает NULL
        });
    }
    
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('tracking_id')->nullable(false)->change(); // Отменяет изменение
        });
    }
};
