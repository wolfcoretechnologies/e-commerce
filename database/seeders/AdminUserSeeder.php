<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::updateOrCreate(
            ['email' => 'hafeez@wolfcoretechnologies.com'],
            [
                'first_name' => 'Hafeez',
                'last_name'=> 'Ahamed',
                'username' => 'hafeez',
                'address' => 'madurai',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ]
        );
    }
}
