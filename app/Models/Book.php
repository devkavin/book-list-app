<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'author',
        'price',
        'stock',
        'book_category_id',
    ];

    public function category()
    {
        // one book belongs to one category (one-to-one relationship)
        return $this->belongsTo(BookCategory::class, 'book_category_id');
    }

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'borrows');
    }

    public function scopeAvailable($query)
    {
        return $query->where('stock', '>', 0);
    }
}
