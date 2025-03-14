<?php

use App\Models\Course;
use App\Models\UE;
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
        Schema::create('course_u_e', function (Blueprint $table) {
            $table->foreignIdFor(Course::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(UE::class)->constrained()->cascadeOnDelete();
            $table->primary(['course_id', 'u_e_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_u_e');
    }
};
