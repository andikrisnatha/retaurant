<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategorySands extends Model
{
    use HasFactory;

    public function menus()
    {
       return $this->hasMany(SandsMenu::class);
    }

    protected $fillable = [
        'description',
    ];
}
