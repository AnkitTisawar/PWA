<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Ankit Kumar',
                'email' => 'ankit@example.com',
                'phone' => '9876543210',
                'avatar_url' => 'https://i.pravatar.cc/150?u=ankit',
                'bio' => 'Full-stack developer with 2 years of experience in Laravel.',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => \Str::random(10),
            ],
            [
                'name' => 'Ravi Singh',
                'email' => 'ravi@example.com',
                'phone' => '9876543211',
                'avatar_url' => 'https://i.pravatar.cc/150?u=ravi',
                'bio' => 'Backend developer passionate about PHP and APIs.',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => \Str::random(10),
            ],
            [
                'name' => 'Priya Sharma',
                'email' => 'priya@example.com',
                'phone' => '9876543212',
                'avatar_url' => 'https://i.pravatar.cc/150?u=priya',
                'bio' => 'Frontend developer specialized in Vue.js.',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => \Str::random(10),
            ],
            [
                'name' => 'Rohan Mehta',
                'email' => 'rohan@example.com',
                'phone' => '9876543213',
                'avatar_url' => 'https://i.pravatar.cc/150?u=rohan',
                'bio' => 'Software engineer with focus on clean architecture.',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => \Str::random(10),
            ],
            [
                'name' => 'Sneha Patel',
                'email' => 'sneha@example.com',
                'phone' => '9876543214',
                'avatar_url' => 'https://i.pravatar.cc/150?u=sneha',
                'bio' => 'UI/UX designer turned Laravel developer.',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => \Str::random(10),
            ],
            [
                'name' => 'Vikram Rao',
                'email' => 'vikram@example.com',
                'phone' => '9876543215',
                'avatar_url' => 'https://i.pravatar.cc/150?u=vikram',
                'bio' => 'API expert who loves performance optimization.',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => \Str::random(10),
            ],
            [
                'name' => 'Neha Gupta',
                'email' => 'neha@example.com',
                'phone' => '9876543216',
                'avatar_url' => 'https://i.pravatar.cc/150?u=neha',
                'bio' => 'Frontend enthusiast passionate about design systems.',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => \Str::random(10),
            ],
            [
                'name' => 'Karan Verma',
                'email' => 'karan@example.com',
                'phone' => '9876543217',
                'avatar_url' => 'https://i.pravatar.cc/150?u=karan',
                'bio' => 'Laravel developer focused on RESTful APIs.',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => \Str::random(10),
            ],
            [
                'name' => 'Aditi Joshi',
                'email' => 'aditi@example.com',
                'phone' => '9876543218',
                'avatar_url' => 'https://i.pravatar.cc/150?u=aditi',
                'bio' => 'Creative developer building scalable web apps.',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => \Str::random(10),
            ],
            [
                'name' => 'Rahul Tiwari',
                'email' => 'rahul@example.com',
                'phone' => '9876543219',
                'avatar_url' => 'https://i.pravatar.cc/150?u=rahul',
                'bio' => 'Tech lead passionate about mentoring juniors.',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => \Str::random(10),
            ],
        ];

        User::insert($users);
    }
}
