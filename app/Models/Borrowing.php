<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Borrowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'student_id',
        'date_borrowed',
        'date_return'
    ];
    protected $casts = [
        'integer' => 'book_id',
        'integer' => 'student_id',
        'date' => 'date_borrowed',
        'date' => 'date_return'
    ];

    public function students() {
        return $this->hasOne(Student::class);
    }
}
