<?php

use App\Models\Semester;
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
        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
            $table->string('name_sem');
            $table->timestamps();
        });

        Schema::table('u_e_s', function (Blueprint $table) {
            $table->foreignIdFor(Semester::class)->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semesters');
        Schema::table('u_e_s', function (Blueprint $table) {
            $table->dropForeignIdFor(Semester::class);
        });
    }
};
