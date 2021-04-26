<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_guests', function (Blueprint $table) {
            $table->id();
            $table->integer("maximum_guests");
            $table->string("instructions");
            $table->string("additional_details");
            $table->unsignedBigInteger('apartment_id');
            $table->foreign('apartment_id')
                    ->references('id')->on('apartment_infos')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('property_guests');
    }
}
