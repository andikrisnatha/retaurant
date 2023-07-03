<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuTag extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];

    /**
     * Get all of the comments for the MenuTag
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(SandsMenu::class);
    }
}
