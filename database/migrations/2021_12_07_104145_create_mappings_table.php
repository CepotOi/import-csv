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
            $table->decimal('kwh1', 8, 1)->nullable();
            $table->decimal('kwh2', 8, 1)->nullable();
            $table->decimal('kwh3', 8, 1)->nullable();
            $table->decimal('kwh4', 8, 1)->nullable();
            $table->decimal('kwh5', 8, 1)->nullable();
            $table->decimal('kwh6', 8, 1)->nullable();
            $table->decimal('kwh7', 8, 1)->nullable();
            $table->decimal('kwh8', 8, 1)->nullable();
            $table->decimal('kwh9', 8, 1)->nullable();
            $table->decimal('kwh10', 8, 1)->nullable();
            $table->decimal('kwh11', 8, 1)->nullable();
            $table->decimal('kwh12', 8, 1)->nullable();
            $table->decimal('kwh13', 8, 1)->nullable();
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
