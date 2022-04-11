<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_departments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('customer_id')->unsigned();
            $table->unsignedBigInteger('department_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_departments', function (Blueprint $table) {
            $table->dropForeign('customer_departments_customer_id_foreign');
        });
        Schema::table('customer_departments', function (Blueprint $table) {
            $table->dropForeign('customer_departments_department_id_foreign');
        });
    }
}
