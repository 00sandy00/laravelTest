<?php

namespace Database\Factories;

use App\Models\Option;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Option::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $enumValues = ['Y', 'N','N','N','N'];
        return [
            'question_id' =>  function() {
                return factory(App\Question::class)->create()->id;
            },       
            'option' => Str::random(10),    
            'is_correct' =>$enumValues[rand(0,4)],       
        ];
    }
}
