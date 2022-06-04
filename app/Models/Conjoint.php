<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conjoint extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'prenom',
        'lieu_naissance',
        'date_naissance',
        'date_mariage',
        'telephone',
        'membre_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date_naissance' => 'date',
        'date_mariage' => 'date',
        'membre_id' => 'integer',
    ];

    public function membre()
    {
        return $this->belongsTo(Membre::class);
    }

    /**
     * Get all of the enfants for the Conjoint
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enfants(): HasMany
    {
        return $this->hasMany(Enfant::class);
    }
}
