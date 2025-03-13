<?php

use App\Models\Level;
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
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('number');
            $table->timestamps();
        });

        // Schema::table('sectors', function (Blueprint $table) {
        //     $table->foreignIdFor(Level::class)->nullable()->constrained()->cascadeOnDelete();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('levels');
        
        // Schema::table('sectors', function (Blueprint $table) {
        //     $table->dropForeignIdFor(Level::class);
        // });
    }
};
