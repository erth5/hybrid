<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('githubs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->integer('unit_number');

            $table->string('account_name');
            $table->string('repository');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('githubs');
    }
};
