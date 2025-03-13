<?php
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
        Schema::create('specialities', function (Blueprint $table) {
            $table->id();
            $table->string('code_sp');
            $table->string('name_sp');
            $table->string('desc_sp');
            $table->string('type');
            $table->integer('hCM');
            $table->integer('hTD');
            $table->integer('hTP');
            $table->timestamps();
        });

        Schema::table('u_e_s', function (Blueprint $table) {
            $table->foreignIdFor(UE::class)->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialities');
        Schema::table('u_e_s', function (Blueprint $table) {
            $table->dropForeignIdFor(UE::class);
        });
    }
};
