<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 30)->default('admin')->after('password');
            $table->string('status', 20)->default('aktif')->after('role');
        });

        // Set akun Cheria Apiani sebagai super_admin utama
        DB::table('users')
            ->where('email', 'cheriaapiani@gmail.com')
            ->update([
                'role' => 'super_admin',
                'status' => 'aktif',
            ]);

        // Pastikan akun lainnya default ke admin aktif
        DB::table('users')
            ->where('email', '!=', 'cheriaapiani@gmail.com')
            ->update([
                'role' => 'admin',
                'status' => 'aktif',
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'status']);
        });
    }
};
