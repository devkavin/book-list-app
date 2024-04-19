<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    use HasFactory;

    public function books()
    {
        // one category can have many books (one-to-many relationship)
        return $this->hasMany(Book::class);
    }
}
