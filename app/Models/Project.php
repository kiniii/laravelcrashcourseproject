<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $fillable = ['title', 'excerpt', 'body'];

    protected $with = ['category', 'projectmember'];

    public function scopeFilter($query, array $filters)
    {
        // (Betere) alternatief
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
        $query->where(fn ($query) =>
        $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('title', 'like', '%' . $search . '%')));

        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query->whereHas('category', fn ($query) => $query->where('slug', $category))
        );

        $query->when(
            $filters['projectmember'] ?? false,
            fn ($query, $projectmember) =>
            $query->whereHas('projectmember', fn ($query) => $query->where('username', $projectmember))
        );
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function projectmember()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
