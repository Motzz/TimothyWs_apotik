<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnMedicines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::table('medicines', function (Blueprint $table) {
            //
            $table->string("form",200);
            $table->string("formula",200);
            $table->string("description",200);
            $table->boolean('faskes_1')->default(0);
            $table->boolean('faskes_2')->default(0);
            $table->boolean('faskes_3')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::table('medicines', function (Blueprint $table) {
            //
            $table->dropColumn("form",200);
            $table->dropColumn("formula",200);
            $table->dropColumn("description",200);
            $table->dropColumn('faskes_1')->default(0);
            $table->dropColumn('faskes_2')->default(0);
            $table->dropColumn('faskes_3')->default(0);
            //
        });
    }
}
