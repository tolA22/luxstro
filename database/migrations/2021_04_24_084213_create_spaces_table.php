<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaces', function (Blueprint $table) {
            $table->id();
            $table->string("leisure_spaces");
            $table->string("guest_spaces");
            $table->integer("bedroom_count");
            $table->integer("bed_count");
            $table->integer("bathroom_count");
            $table->string("bathroom_amenities");
            $table->unsignedBigInteger("apartment_id");
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
        Schema::dropIfExists('spaces');
    }
}
