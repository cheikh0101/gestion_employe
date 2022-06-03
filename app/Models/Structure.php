<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Structure extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'nom',
        'cigle',
        'logo',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * Get all of the gestionnaires for the Structure
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gestionnaires(): HasMany
    {
        return $this->hasMany(Gestionnaire::class);
    }
}
