<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwimMetricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swim_metrics', function (Blueprint $table) {
            $table->id();
            $table->integer('time');
            $table->integer('heart_rate');
            $table->decimal('distance');
            $table->decimal('pace');
            $table->integer('stroke_count');
            $table->integer('stroke_rate');
            $table->integer('calories');
            $table->decimal('distance_per_stroke');
            $table->integer('user_id')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('swim_metrics');
    }
}
