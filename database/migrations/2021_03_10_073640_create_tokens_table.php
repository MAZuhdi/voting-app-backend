<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->string('secret', 8)->unique();
            $table->foreignId('event_id')->nullable()->constrained();
            $table->enum('is_used', [0, 1])->default(1);
            $table->foreignId('used_by')->nullable(); //user id
            $table->foreignId('requested_by')->nullable()->constrained('users'); //user id
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokens');
    }
}
