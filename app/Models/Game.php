<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'slug',
        'entry_fee',
        'max_players',
        'active',
        'start_time',
        'end_time',
        'rules',
        'winner_id',
        'category_id',
        'image_url',
    ];

    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
