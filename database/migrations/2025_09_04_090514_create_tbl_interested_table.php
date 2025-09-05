<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblInterestedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_interested', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_id');
            $table->date('interested_date');
            $table->time('interested_time');
            $table->string('interested_code', 50)->unique();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('mobile', 10);
            $table->string('time_callback', 255);
            $table->text('more_information')->default('');
            $table->tinyInteger('accept_policy')->default(1);

            $table->timestamps();

            $table->unsignedInteger('created_by')->default(0);
            $table->unsignedInteger('updated_by')->default(0);
            
            $table->unsignedTinyInteger('deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_interested');
    }
}
