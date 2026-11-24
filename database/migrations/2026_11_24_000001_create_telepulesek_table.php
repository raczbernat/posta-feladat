<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('telepulesek', function (Blueprint $table) {
            $table->id();
            $table->string('irsz');
            $table->string('nev');
            $table->string('megye');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('telepulesek');
    }
};
