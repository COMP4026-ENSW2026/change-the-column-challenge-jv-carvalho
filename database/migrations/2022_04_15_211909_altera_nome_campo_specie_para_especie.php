<?php

use App\Http\Controllers\API\PetsController;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlteraNomeCampoSpecieParaEspecie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pets', function (Blueprint $table) {
            if (Schema::hasColumn("pets", "specie")) {
                $table->renameColumn('specie', 'especie');
            }
        });

        (new PetsController)->alteraValoresAntigosCampoEspecie();
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
