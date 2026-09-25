<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('humans', function (Blueprint $table): void {
            $table->id();
            $table->string('name', 255);
            $table->unsignedInteger('aura');
            $table->string('hierarchy', 20);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('humans');
    }
};
