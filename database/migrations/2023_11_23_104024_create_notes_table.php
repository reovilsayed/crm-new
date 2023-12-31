<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('external_id'); 
            $table->text('content');
            $table->morphs('noteable');
            $table->boolean('pinned')->default(false);
            $table->timestamp('noted_at')->nullable();
            $table->unsignedBigInteger('user_created_id')->nullable();
            $table->foreign('user_created_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('user_updated_id')->nullable();
            $table->foreign('user_updated_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('user_deleted_id')->nullable();
            $table->foreign('user_deleted_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('user_restored_id')->nullable();
            $table->foreign('user_restored_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('notes');
    }
};
