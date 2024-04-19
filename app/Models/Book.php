<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function category()
    {
        // one book belongs to one category (one-to-one relationship)
        return $this->belongsTo(BookCategory::class, 'book_category_id');
    }
}
