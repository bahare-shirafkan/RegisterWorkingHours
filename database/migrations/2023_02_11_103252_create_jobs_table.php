<?php

use App\Models\Job;
use App\Models\User;
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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string(Job::COL_TITLE);
            $table->text(Job::COL_DESC)->nullable();
            $table->float(Job::COL_HOUR_SALARY);
            $table->foreignIdFor(User::class)->constrained();
            $table->timestamp(Job::COL_START_TIME)->nullable();
            $table->timestamp(Job::COL_END_TIME)->nullable();
            $table->string(Job::COL_PHONE)->nullable();
            $table->string(Job::COL_ADDRESS)->nullable();
            $table->string(Job::COL_CURRENCY);
            $table->string(Job::COL_IMG)->nullable();
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
        Schema::dropIfExists('jobs');
    }
};
