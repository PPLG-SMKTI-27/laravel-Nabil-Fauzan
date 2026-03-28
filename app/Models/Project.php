<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'title',
        'description',
        'tech',
        'link',
        'user_id',
    ]; 

    protected $casts = [
        'tech' => 'array',
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Pencarian judul, deskripsi, atau teks tech (JSON).
     */
    public function scopeSearch(Builder $query, ?string $term): Builder
    {
        $term = $term !== null ? trim($term) : '';
        if ($term === '') {
            return $query;
        }

        $like = '%'.$term.'%';

        return $query->where(function (Builder $q) use ($like) {
            $q->where('title', 'like', $like)
                ->orWhere('description', 'like', $like)
                ->orWhere('tech', 'like', $like);
        });
    }
}
