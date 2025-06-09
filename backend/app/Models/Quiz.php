<?php
// app/Models/Quiz.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $primaryKey = 'qid'; 
    protected $fillable = ['lesson_id', 'title', 'total_mark'];
}
