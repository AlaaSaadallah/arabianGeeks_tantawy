<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_nu');
            $table->bigInteger('user_id');
            $table->string('category');
            $table->string('paper_type');
            $table->decimal('width', 8, 2);
            $table->decimal('height', 8, 2);
            $table->string('print_option')->nullable();
            $table->string('color')->nullable();
            $table->string('finish_option')->nullable();
            $table->string('finish_direction')->nullable();
            $table->string('address')->nullable();
            $table->string('notes')->nullable();
            $table->integer('order_status_id');
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
        Schema::dropIfExists('orders');
    }
}
