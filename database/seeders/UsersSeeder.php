<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create(['name' => 'Pengguna Simulator', 'email' => 'ipt@bi.go.id', 'role_id' => '2', 'password' => Hash::make('password')]);
    }
}
