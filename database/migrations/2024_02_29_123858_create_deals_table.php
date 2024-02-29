<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->integer('lead_id');
            $table->string('service_type', 40);
            $table->decimal('estimated_price', 8, 2);
            $table->string('follow_up', 160);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('deals');
    }
};
