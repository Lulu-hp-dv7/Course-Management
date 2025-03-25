<?php

use App\Models\Building;
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
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->string('code_build');
            $table->string('place');
            $table->timestamps();
        });

        Schema::table('classrooms', function (Blueprint $table) {
            $table->foreignIdFor(Building::class)->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buidings');
        Schema::table('classrooms', function (Blueprint $table) {
            $table->dropForeignIdFor(Building::class);
        });
    }
};
