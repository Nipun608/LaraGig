<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listings;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    
    {


        // $user = User::factory()->create([
        //     'name'=>'John Doe',
        //     'email'=>'john@gmail.com'
        // ]);

        // Listings::factory(6)->create([

        
        //     'user_id'=>$user->id
        // ]);

        User::factory(10)->create();


        // Listings::create([
        //     'user_id' => $user->id,
        //     'title'=>'Laravel Senior Developer',
        //     'tags'=>'Laravel , JavaScript',
        //     'company'=>'Intera',
        //     'location'=>'Sri Lanka',
        //     'email'=>'in@gmail.com',
        //     'website'=>'in.com',
        //     'description'=>'Software company that inovates best softwares to the industry',

        // ]);
        // Listings::create([
        //     'title'=>'Springboot Senior Developer',
        //     'tags'=>'Springboot , JavaScript',
        //     'company'=>'Vistusa',
        //     'location'=>'Sri Lanka',
        //     'email'=>'v@gmail.com',
        //     'website'=>'in.com',
        //     'description'=>'Software company that inovates best softwares to the industry',

        // ]);




        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
