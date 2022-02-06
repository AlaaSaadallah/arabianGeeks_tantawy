<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePriceColumnFromPaperSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paper_sizes', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->renameColumn('quantity_in_quarter', 'divided_by');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paper_sizes', function (Blueprint $table) {
            $table->decimal('price', 8, 2);
            $table->renameColumn('divided_by','quantity_in_quarter');

        });
    }
}
