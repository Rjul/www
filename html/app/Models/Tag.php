<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Tag extends Model
{
    use HasFactory;

    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'created_at',
        'deleted_at'
    ];
}
