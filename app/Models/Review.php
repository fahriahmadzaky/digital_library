<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'id_book');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
