<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Course::factory(10)->create();
        DB::table('courses')->insert([
            'course_name' => 'Algorithm In Programming',
            'course_description' => 'Learn basic algorithm in programming using C',
            'course_image' => 'Algorithm-in-Programming.jpg',
            'course_session' => 12,
            'created_at' => now()
        ]);
        DB::table('courses')->insert([
            'course_name' => 'DataStructures.jpg',
            'course_description' => 'Learn about datastructure in proggraming such as linked list, binary search tree, hash table, etc. using C programming',
            'course_image' => 'DataStructures.jpg',
            'course_session' => 12,
            'created_at' => now()
        ]);
        DB::table('courses')->insert([
            'course_name' => 'Fundamental of database',
            'course_description' => 'Learn the fundamental of database to create and design a database',
            'course_image' => 'Fundamental of Database.jpg',
            'course_session' => 6,
            'created_at' => now()
        ]);
        DB::table('courses')->insert([
            'course_name' => 'Website Development',
            'course_description' => 'Learn to develop your own simple website using HTML5, CSS, and JavaScript',
            'course_image' => 'web-development.png',
            'course_session' => 6,
            'created_at' => now()
        ]);
        DB::table('courses')->insert([
            'course_name' => 'Mobile Application Development',
            'course_description' => 'Learn how to create a mobile application using android studio',
            'course_image' => 'android-studio.png',
            'course_session' => 6,
            'created_at' => now()
        ]);
        DB::table('courses')->insert([
            'course_name' => 'Object Oriented Programming',
            'course_description' => 'Learn About Object Oriented Programming concept and implementation using Java 11',
            'course_image' => 'OOP.png',
            'course_session' => 12,
            'created_at' => now()
        ]);
    }
}
