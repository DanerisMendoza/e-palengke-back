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
        Schema::create('side_nav_children', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_side_nav_id');
            $table->string('name');
            $table->string('mdi_icon')->nullable();
            $table->string('pic_icon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('side_nav_children');
    }
};
