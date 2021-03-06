<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //primary
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('organization_id');
            $table->primary(['user_id', 'organization_id']);
            //related user
            $table->unsignedInteger('referred_by_user_id')->nullable();
            $table->unsignedInteger('referred_by_organization_id')->nullable();
            $table->string('name')->unique();
            $table->unsignedInteger('counter')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('users');
    }
}
