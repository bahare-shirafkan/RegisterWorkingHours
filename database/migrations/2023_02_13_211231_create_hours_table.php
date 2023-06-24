<?php

use App\Models\Hour;
use App\Models\Job;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hours', function (Blueprint $table) {
            $table->id();
            $table->timestamp(Hour::COL_DATE);
            $table->string(Hour::COL_FROM_TIME);
            $table->string(Hour::COL_TO_TIME);
            $table->integer(Hour::COL_DIFF_TIME)->nullable();
            $table->foreignIdFor(Job::class)->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hours');
    }
};
