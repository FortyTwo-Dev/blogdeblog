<?php

namespace App\Models;

use App\Policies\BlogPolicy;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[UsePolicy(BlogPolicy::class)]
class Blog extends Model
{
    use HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'slug',
        'title',
        'description',
        'image_path',
        'deleted_at',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'blog_category', 'blog_id', 'category_id')->withTimestamps();
    }

    public function talks(): HasMany
    {
        return $this->hasMany(Talk::class, 'blog_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}