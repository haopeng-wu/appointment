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
            $table->foreignId("consultant_id")->nullable()->default(0);

            $table->string("customer_name");
            $table->string("email");
            $table->string("address")->nullable()->default("");
            $table->string("tel")->nullable()->default("");

            $table->double("price", 12,4)->nullable()->default(300);
            $table->decimal("discount", 4,2)->nullable()->default(1);
            $table->double("charge", 12, 4)->nullable()->default(300);
            $table->text("memo")->nullable()->default("");
            $table->text("notes")->nullable()->default("");
            $table->boolean("payment_status")->default(0);
            $table->string("payment_method")->nullable()->default("stripe");
            $table->string("validity")->nullable()->default(1);
            $table->string("consultant")->nullable()->default("M's mother");

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
