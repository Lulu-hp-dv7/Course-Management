<?php

use App\Models\Level;
use App\Models\Sector;
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
        Schema::create('level_sector', function (Blueprint $table) {
            $table->foreignIdFor(Level::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Sector::class)->constrained()->cascadeOnDelete();
            $table->primary(['level_id', 'sector_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_sector');
    }
};
