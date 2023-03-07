<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];
    protected $fillable = ['title', 'excerpt', 'body'];

    // eager loading, lädt category und author immer mit
    // protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters) {         // Post::newQuery()->filter()
        if (isset($filters['search'])) {
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
