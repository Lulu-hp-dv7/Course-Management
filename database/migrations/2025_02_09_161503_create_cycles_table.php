<?php

use App\Models\Cycle;
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
        Schema::create('cycles', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->integer('nb_level');
            $table->text('description');
            $table->timestamps();
        });

        Schema::table('levels', function (Blueprint $table) {
            $table->foreignIdFor(Cycle::class)->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cycles');
        Schema::table('levels', function (Blueprint $table) {
            $table->dropForeignIdFor(Cycle::class);
        });
    }
};
