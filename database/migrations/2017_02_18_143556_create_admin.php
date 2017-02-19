<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        App\User::create([
            'name' => "admin",
            'email' => "admin@admin.com",
            'password' => bcrypt("admin888"),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        App\User::where('email', '=', 'admin@admin.com')->delete();
    }
}
