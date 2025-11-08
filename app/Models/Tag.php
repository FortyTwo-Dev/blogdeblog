<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'slug',
        'name',
        'color',
        'icon',
        'deleted_at',
    ];

    public function talks(): BelongsToMany
    {
        return $this->belongsToMany(Talk::class, 'tag_talk', 'tag_id', 'talk_id')->withTimestamps();
    }
}
