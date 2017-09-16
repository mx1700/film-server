<?php

use Illuminate\Database\Seeder;

class AdminResetPassword extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\User::query()->where('name', '=', 'admin')->first();
        $admin->password = bcrypt("admin888");
        $admin->save();
    }
}
