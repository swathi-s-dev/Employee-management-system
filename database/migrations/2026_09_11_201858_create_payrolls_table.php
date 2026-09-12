<?php

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
    Schema::create('payrolls', function (Blueprint $table) {
        $table->id();

        $table->foreignId('employee_id')
              ->constrained('employees')
              ->cascadeOnDelete();

        $table->string('month');
        $table->decimal('basic_salary', 10, 2);
        $table->decimal('allowance', 10, 2)->default(0);
        $table->decimal('deduction', 10, 2)->default(0);
        $table->decimal('net_salary', 10, 2);

        $table->enum('status', [
            'Pending',
            'Paid'
        ])->default('Pending');

        $table->timestamps();

        $table->unique(['employee_id', 'month']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
