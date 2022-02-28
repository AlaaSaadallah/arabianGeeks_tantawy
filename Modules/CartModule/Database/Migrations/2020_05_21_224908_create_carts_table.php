<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable();
            $table->string('image')->nullable();
            $table->string('category')->nullable();
            $table->string('paper_type')->nullable();
            $table->string('paper_size')->nullable();
            $table->string('quantity')->nullable();
            $table->string('inner_quantity')->nullable();
            $table->string('print_option')->nullable();
            $table->string('front_color')->nullable();
            $table->string('back_color')->nullable();
            $table->string('cut_style')->nullable();
            $table->string('rega')->nullable();
            $table->string('solovan')->nullable();
            $table->string('cover_paper_type')->nullable();
            $table->string('finish_option')->nullable();
            $table->string('finish_direction')->nullable();
            $table->string('notes')->nullable();
            $table->decimal('shipping', 8, 2);
            $table->decimal('total_price', 8, 2);

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
        Schema::dropIfExists('carts');
    }
}
