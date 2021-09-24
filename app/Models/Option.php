<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'options';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

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

    public function GetMarks(array $id)
    {
        // DB::enableQueryLog();
        $marks= $this->where('is_correct','Y')->whereIn('id', $id)->count();
        // dd(DB::getQueryLog()); 
        return $marks;
    }


}
