<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Lookup;
use App\Models\Tag;
use App\Models\Author;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ritu Khwalapala',
            'email' => 'ritu@gmail.com',
            'password' => 'ritu'
        ]);

        // User::create([
        //     'name' => 'basanta  chapagain',
        //     'email' => 'basanta@example.com',
        //     'password' => Hash::make('basanta')
        // ]);

        // Student::create([
            
        //     'name' => 'ritu  khwalapala',
        // 'roll_no'=> 36,
        // 'email'=> 'ritu@example.com',
        // 'address'=> 'ktm',
        // 'temp_address'=> 'bkt',
        // 'passout_key'=> 1
        // ]);

        // Author::create([

        //     'username'=> 'nomi',
        // 'password' => 'abc123',
        // 'salt'=> '@123',
        // 'email'=> 'nom@gmail.com'
        // ]);
        
        // Lookup::create([
        //     'name'=> 'suniyo',
        // 'code'=>'xyz',
        // 'type'=>'oop',
        // 'position'=>1
        // ]);

        // Tag::create([
        //  'name'=> 'yuna',
        // 'frequency'=>7

        // ]);
        


    }
}
