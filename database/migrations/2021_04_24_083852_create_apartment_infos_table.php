<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartment_infos', function (Blueprint $table) {
            $table->id();
            $table->string("address");
            $table->string("city");
            $table->string("state");
            $table->unsignedBigInteger('property_type_id');
            $table->integer("minimum_nights")->nullable();
            $table->integer("maximum_nights")->nullable();
            $table->time("check_in_time_from");
            $table->time("check_in_time_to");
            $table->decimal("price");
            $table->boolean("same_day_bookings")->default(false);
            $table->string("description")->nullable();
            $table->string("name")->nullable();
            $table->timestamps();

            $table->foreign('property_type_id')
                    ->references('id')->on('property_types')
                    ->onDelete('cascade');

            $table->softDeletes();
            // add foreign keys
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartment_infos');
    }
}
