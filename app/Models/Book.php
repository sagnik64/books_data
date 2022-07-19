<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Borrowing;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'published_year',
        'total_pages',
        'quantity'
    ];
    protected $casts = [
        'integer' => 'published_year',
        'integer' => 'total_pages',
        'integer' => 'quantity'
    ];

    public function borrowings() {
        return $this->hasMany(Borrowing::class);
    }
}
