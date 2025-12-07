<?php

namespace App\Models;

use App\Policies\BlogPolicy;
use Database\Factories\BlogFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

#[UsePolicy(BlogPolicy::class)]
class Blog extends Model
{
    use HasUuids, HasFactory, SoftDeletes;

    // public function resolveRouteBinding($value, $field = null)
    // {
    //     $routeName = request()->route()->getName();

    //     dd($routeName);

    //     if ($routeName === 'blog.show') {
    //         return $this->where('slug', $value)->firstOrFail();
    //     }

    //     return parent::resolveRouteBinding($value, $field);
    // }

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'slug',
        'title',
        'theme',
        'description',
        'image_path',
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

    public function imageUrl()
    {
        if (!$this->image_path) {
            return false;
        }
        return Storage::disk('public')->url($this->image_path);
    }
}