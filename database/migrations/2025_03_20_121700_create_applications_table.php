<?php

return new class extends Migration
{
    /**
     * Run the migrations. 
     */
    public function up(): void
    { 
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('jobpost_id')->constrained()->onDelete('cascade');
            $table->string('resume'); 
            $table->text('cover_letter');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
