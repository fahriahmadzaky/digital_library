<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categorybook_relations', 'id_book', 'id_category');
    }

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class, 'id_book');
    }

    // buat ambil data collection
    public function collections()
    {
        return $this->belongsToMany(User::class, 'collections', 'id_book', 'id_user');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'id_book');
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }
}
