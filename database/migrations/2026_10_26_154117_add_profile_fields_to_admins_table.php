<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->text('address')->nullable();
            $table->string('country')->nullable();
            $table->string('role')->default('Admin');
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode', 20)->nullable();
            $table->string('mobile_number', 30)->nullable();
            $table->string('email')->nullable();
            $table->string('profile_picture')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn([
                'name',
                'address',
                'role',
                'country',
                'state',
                'city',
                'pincode',
                'mobile_number',
                'email',
                'profile_picture',
            ]);
        });
    }
};
