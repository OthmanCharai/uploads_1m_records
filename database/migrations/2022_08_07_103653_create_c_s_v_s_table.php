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
        Schema::create('c_s_v_s', function (Blueprint $table) {
            $table->id();
            $table->text("Region");
            $table->text("Country");
            $table->text("Item Type");
            $table->text("Sales Channel");
            $table->text("Order Priority");
            $table->text("Order Date");
            $table->text("Order ID");
            $table->text("Ship Date");
            $table->text("Units Sold");
            $table->text("Unit Price");
            $table->text("Unit Cost");
            $table->text("Total Revenue");
            $table->text("Total Cost");
            $table->text("Total Profit");
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
        Schema::dropIfExists('c_s_v_s');
    }
};