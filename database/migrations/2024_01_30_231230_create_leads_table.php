<?php

use App\Enums\Source;
use App\Enums\Status;
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
        if (!Schema::hasTable('leads')) {
            Schema::create('leads', function (Blueprint $table) {
                $table->id();
                $table->string('first_name');
                $table->string('last_name');
                $table->string('company')->nullable();
                $table->unsignedTinyInteger('source')->default(Source::SITE->value);
                $table->string('phone');
                $table->string('email');
                $table->string('address')->nullable();
                $table->string('city')->nullable();
                $table->string('uf')->nullable();
                $table->string('cep')->nullable();
                $table->string('description')->nullable();
                $table->unsignedTinyInteger('status')->default(Status::OPEN_NOT_CONTACTED);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
