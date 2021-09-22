<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'question_id',
        'option',
        'is_correct',
    ];

     /**
     * Get the question associated with the option
     */
    public function question()
    {
        return $this->belongsTo(Question::class, 'foreign_key');
    }
}
