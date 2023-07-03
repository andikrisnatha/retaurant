<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SandsMenu extends Model
{
    use HasFactory;

    public function categories()
    {
       return $this->belongsTo(CategorySands::class, 'category_sands_id');
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(MenuTag::class);
    }

    protected $fillable = [
        'main_title',
        'user_id',
        'description',
        'title_1',
        'title_2',
        'title_3',
        'title_4',
        'price_1',
        'price_2',
        'price_3',
        'price_4',
        'image',
        'video_url',
        'category_id',
        'tag_id',
        'status',
    ];

}
