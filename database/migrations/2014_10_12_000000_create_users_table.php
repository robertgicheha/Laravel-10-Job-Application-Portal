<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string ('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('about')->nullable();
            $table->string ('profile_pic')->nullable();
            $table->string ('uer_type');
            $table->string ('resume')->nullable();
            $table->date ('user_trial')->nullable();
            $table->date ('billing_ends')->nullable();
            $table->string ('status')->nullable();
            $table->string ('plan')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
