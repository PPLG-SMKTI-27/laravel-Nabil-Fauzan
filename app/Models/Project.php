<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'title',
        'description',
        'tech',
        'link',
    ];

    protected $casts = [
        'tech' => 'array',
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;
}
