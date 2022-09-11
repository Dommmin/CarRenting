<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Car extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name', 'year', 'fuel', 'fuel_consumption',
        'seats', 'gearbox', 'price', 'horsepower',
        'torque', 'acceleration', 'engine', 'drivetrain',
        'available', 'main', 'description'
    ];

    protected $casts = ['images' => 'array'];

    /**
     * @return HasMany
     */
    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    /**
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
