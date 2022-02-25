<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Montre extends Model
{
    use HasFactory;

    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'postDescription',
        'imageUrl',
        'author',
        'price',
        'quatity'
    ];
}
