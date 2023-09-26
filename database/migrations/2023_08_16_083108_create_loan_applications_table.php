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
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('email');
            $table->decimal('loan_amount', 10, 2);
            $table->text('loan_purpose');
            $table->enum('employment_status', ['employed', 'self-employed', 'unemployed']);
            $table->string('employer_name')->nullable();
            $table->string('job_title')->nullable();
            $table->decimal('monthly_income', 10, 2)->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_type')->nullable();
            $table->decimal('business_monthly_income', 10, 2)->nullable();
            $table->string('status')->default('processing');
            $table->string('reject_reason')->default('processing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_applications');
    }
};

