<?php

use App\Models\Department;
use App\Models\Unit;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Unit::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(Department::class)
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('name');
            $table->string('type');
            $table->string('ip_address')->nullable();
            $table->string('mac_address')->nullable();
            $table->string('asset_tag')->nullable();
            $table->enum('status', ['ativo', 'manutencao', 'inativo'])->default('ativo');
            $table->date('installation_date')->nullable();
            $table->string('responsible_name')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();

            $table->index(['unit_id', 'type']);
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
