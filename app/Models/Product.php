<?php

namespace App\Models;

use App\Models\User;
use App\Models\Favori;
use App\Models\Category;
use App\Models\Commentaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $fillable = ['category_id','user_id','name','description','prix','defaultImage','carouselImage'];

    use HasFactory;

    protected $casts = [
        'carouselImage'=>'array',
    ];


        public function category(): BelongsTo
        {
            return $this->belongsTo(Category::class);
        }

        public function commentaire(): HasMany
        {
            return $this->hasMany(Commentaire::class);
        }

        public function favori(): HasMany
        {
            return $this->hasMany(Favori::class);
        }

        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }


}
