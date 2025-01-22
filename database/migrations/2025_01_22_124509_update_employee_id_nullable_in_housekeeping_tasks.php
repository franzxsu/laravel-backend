<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEmployeeIdNullableInHousekeepingTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('housekeeping_tasks', function (Blueprint $table) {
            // Make employee_id nullable
            $table->unsignedBigInteger('employee_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('housekeeping_tasks', function (Blueprint $table) {
            // Revert the employee_id column to not nullable if needed
            $table->unsignedBigInteger('employee_id')->nullable(false)->change();
        });
    }
}
