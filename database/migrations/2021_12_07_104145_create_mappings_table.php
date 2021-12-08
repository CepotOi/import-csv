<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mappings', function (Blueprint $table) {
            $table->id();
            $table->string('group')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('key')->nullable()->unique();
            $table->decimal('sdp_l6', 8, 1)->nullable();
            $table->decimal('lp_l6', 8, 1)->nullable();
            $table->decimal('sdp_l7', 8, 1)->nullable();
            $table->decimal('lp_l7', 8, 1)->nullable();
            $table->decimal('sdp_l8', 8, 1)->nullable();
            $table->decimal('lp_l8', 8, 1)->nullable();
            $table->timestamp('tgl_input')->nullable();
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
        Schema::dropIfExists('mappings');
    }
}
