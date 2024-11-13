<?php

use App\Models\ComboPlan;
use App\Models\Plan;
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
        Schema::create('combo_plan_plan', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Plan::class)->constrained()->onDeleteCascade();
            $table->foreignIdFor(ComboPlan::class)->constrained()->onDeleteCascade();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combo_plan_plan');
    }
};
