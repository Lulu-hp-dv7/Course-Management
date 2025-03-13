<?php

use App\Models\Sector;
use App\Models\Speciality;
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
        Schema::create('sectors', function (Blueprint $table) {
            $table->id();
            $table->string('code_sec');
            $table->string('name_sec');
            $table->string('desc_sec');
            $table->timestamps();
        });

        Schema::table('specialities', function (Blueprint $table) {
            $table->foreignIdFor(Sector::class)->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sectors');
        Schema::table('specialities', function (Blueprint $table) {
            $table->dropForeignIdFor(Sector::class);
        });
    }
};
