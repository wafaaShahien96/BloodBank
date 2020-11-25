<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Wafaa Shahien',
            'email' => 'admin@admin.com',
            'password' => bcrypt('11445522'),
            ]);

    }
}
