<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->integer('cut_number')->after('cut_style')->nullable();
            $table->integer('zigzag')->after('cut_number')->nullable();
             $table->string('cover_print_option')->after('cover_paper_type')->nullable();
            $table->string('cover_front_color')->after('cover_print_option')->nullable();
            $table->string('cover_back_color')->after('cover_front_color')->nullable();
            $table->string('cover_solovan')->after('cover_back_color')->nullable();
            $table->string('cover_rega')->after('cover_solovan')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('zigzag');

            $table->dropColumn('cut_number');
            $table->dropColumn('cover_print_option');
            $table->dropColumn('cover_front_color');
            $table->dropColumn('cover_back_color');
            $table->dropColumn('cover_solovan');
            $table->dropColumn('cover_rega');

        });
    }
}
