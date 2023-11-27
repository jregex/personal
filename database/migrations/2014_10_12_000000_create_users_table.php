<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Wisnu Trisardi');
            $table->string('callname', 30)->default('Wisnu')->nullable();
            $table->string('username', 30)->default('wisnu123');
            $table->string('email')->unique();
            $table->date('tgl_lahir')->nullable();
            $table->string('no_hp')->nullable();
            $table->text('resume')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default(Hash::make('ganser123'));
            $table->string('image')->default('default.webp');
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
