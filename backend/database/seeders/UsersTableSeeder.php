<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role_id' => Role::where('name', 'admin')->first()['id'],
        ]);

        $teacher = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('teacher123'),
            'role_id' => Role::where('name', 'teacher')->first()['id'],
        ]);

        $student = User::create([
            'name' => 'Jane Student',
            'email' => 'jane@example.com',
            'password' => Hash::make('student123'),
            'role_id' => Role::where('name', 'student')->first()['id'],
        ]);
    }
}
