<?php

namespace App;

use App\Space\DraftScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    /**
     * The boot method of a model
     */
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new DraftScope());
    }
    /**
     * Get the user for the blog article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category for the blog article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the tags for the blog article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\morphToMany
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Check Authentication
     * 
     * @param $query
     * @return mixed
     */
    public function scopeCheckAuth($query)
    {
        if (auth()->check() && auth()->user()->is_admin) {
            $query->withoutGlobalScope(DraftScope::class);
        }

        return $query;
    }
}

