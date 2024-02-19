<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiaryRecord extends Model
{
    use SoftDeletes;
    protected $table = 'diary_record';

    public function add(string $question, string $answer)
    {
        $question = strtolower(trim($question));
        $answer = strtolower(trim($answer));

        if (strlen($question) > 280 || strlen($answer) > 280) {
            return [
                'result' => 'error',
                'textResult' => 'Max value must be 280 letter'
            ];
        }

        return self::create(['question' => $question, 'answer' => $answer, 'user_id' => auth()->user()->id]);
    }

    public function get()
    {
        return self::where('user_id', auth()->user()->id)->get();
    }
}
