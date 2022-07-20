<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Borrowing;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'roll_number',
        'student_email',
        'student_password',
    ];
    
    public function borrowings() {
        return $this->hasOne(Borrowing::class);
    }
}
