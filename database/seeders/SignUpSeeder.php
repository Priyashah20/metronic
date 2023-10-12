<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SignUp;

class SignUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SignUp::create([
            'name' => 'Priya',
            'email' => 'priya@gmail.com',
            'phone' => '7809998675',
            'password' => bcrypt('12345678'),

        ]);
    }
}
