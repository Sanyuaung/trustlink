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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("father_name");
            $table->string("email")->unique();
            $table->string('apply_position');
            $table->string('nrc');
            $table->date("day_of_birth");
            $table->string('address')->nullable();
            $table->string('phone');
            $table->string('image');
            $table->string('gender');
            $table->string('nationality');
            $table->string('religion');
            $table->boolean('marital_status')->nullable()->default(false);
            $table->string('spouse_name')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('other_qualification')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};