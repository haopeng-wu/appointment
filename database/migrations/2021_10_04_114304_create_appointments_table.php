<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("appointment_no");
            $table->date("date");
            $table->integer("which_slot");
            $table->string("start_end_time");

            $table->foreignId("customer_id")->nullable();
            $table->foreignId("consultant_id")->nullable();

            $table->string("customer_name");
            $table->string("email");
            $table->string("address")->nullable();
            $table->string("tel")->nullable();

            $table->double("price", 12,4)->nullable();
            $table->decimal("discount", 4,2)->nullable();
            $table->double("charge", 12, 4)->nullable();
            $table->text("memo")->nullable();
            $table->text("notes")->nullable();
            $table->boolean("payment_status");
            $table->string("payment_method")->nullable();
            $table->string("validity")->nullable();
            $table->string("consultant")->nullable();

            $table->foreign("customer_id")->references("id")->on("users");
            $table->foreign("consultant_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
