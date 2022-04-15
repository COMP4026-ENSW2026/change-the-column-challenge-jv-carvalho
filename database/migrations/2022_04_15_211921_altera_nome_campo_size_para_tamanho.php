<?php

use App\Http\Controllers\API\PetsController;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlteraNomeCampoSizeParaTamanho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pets', function (Blueprint $table) {
            if (Schema::hasColumn("pets", "size")) {
                $table->renameColumn('size', 'tamanho');
            }
        });

        (new PetsController)->alteraValoresAntigosCampoTamanho();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
