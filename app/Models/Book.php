<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'published_year',
        'total_pages'
    ];
    protected $casts = [
        'integer' => 'published_year',
        'integer' => 'total_pages'
    ];
}
