<?php

namespace Database\Seeders;
use App\Models\Question;
use App\Models\Option;
use Illuminate\Database\Seeder;

class QuestionOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //create question with options
        Question::factory()->count(30)->create()->each(function ($Question) {
            //create 4 option for each question
            Option::factory()->count(4)->create(['question_id'=>$Question->id]);
        });
    }
}
