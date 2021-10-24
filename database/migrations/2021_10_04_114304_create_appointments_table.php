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
            /*
             * Appointment information
             */
            $table->string("appointment_no");
            $table->date("date");
            $table->foreignId("which_slot");
            $table->string("start_end_time");
            $table->string('duration');
            /*
             *  Customer information
             */
            $table->foreignId("customer_id")->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            /*
             * Billing address
             */
            $table->string("given_name")->nullable();
            $table->string("family_name")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->string("street_address")->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            /*
             *  Order information
             */
            $table->string('klarna_order_id')->nullable();
            $table->double("order_amount", 12, 4)->nullable();
            $table->string('purchase_country')->nullable();
            $table->string('purchase_currency')->nullable();
            $table->string('locale')->nullable();

            $table->decimal("discount", 4,2)->nullable();
            $table->double("price", 12,4)->nullable();
            $table->text("memo")->nullable();
            $table->text("notes")->nullable();
            $table->boolean("payment_status")->nullable()->default(0);
            $table->string("payment_method")->nullable()->default("klarna");
            $table->string("validity")->nullable()->default(1);
            $table->string("consultant")->nullable()->default("mother");

            $table->foreign("customer_id")->references("id")->on("users");
            $table->foreign('which_slot')->references('id')->on('slots');
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
