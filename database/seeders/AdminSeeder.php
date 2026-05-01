<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Expense;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Comment;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'full_name' => 'Admin User',
            'user_name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '0999999999',
            'password' => Hash::make('12345678'),
            'bio' => 'Main Admin',
            'is_verified' => true,
            'location_id' => null,
            'image' => null,
        ]);
        Category::insert([
            ['id' => 1, 'name' => 'Medical'],
            ['id' => 2, 'name' => 'Education'],
            ['id' => 3, 'name' => 'Food'],
            ['id' => 4, 'name' => 'Housing'],
            ['id' => 5, 'name' => 'Emergency'],
            ['id' => 6, 'name' => 'Orphans'],
            ['id' => 7, 'name' => 'Disabilities'],
            ['id' => 8, 'name' => 'Small Projects'],
            ['id' => 9, 'name' => 'Medicine'],
            ['id' => 10, 'name' => 'University Students'],
        ]);


        Post::create([
            'category_id' => 1,
            'title' => 'Welcome to Syriora',
            'description' => 'This is the first post on Syriora. We are excited to have you here!',
            'user_id' => 1,
        ]);
        Expense::create([
            'post_id' => 1,
            'user_id' => 1,
            'title' => 'Initial Expense',
            'amount' => 100,
            'description' => 'Initial expense for the first post',
            'status' => 'pending',
            'proof_document_url' => 'https://example.com/proof.pdf',
        ]);
        Comment::create([
            'post_id' => 1,
            'user_id' => 1,
            'content' => 'This is a comment on the first post.',
        ]);
    }
}
