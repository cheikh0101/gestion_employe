<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Membre extends Model
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
        'cni',
        'matricule',
        'lieu_naissance',
        'date_naissance',
        'telephone',
        'email',
        'sexe',
        'situation_matrimoniale',
        'structure_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date_naissance' => 'date',
    ];

    /**
     * Get the structure that owns the Membre
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function structure(): BelongsTo
    {
        return $this->belongsTo(Structure::class);
    }

    /**
     * Get all of the enfants for the Membre
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enfants(): HasMany
    {
        return $this->hasMany(Enfant::class);
    }

    /**
     * Get all of the conjoints for the Membre
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conjoints(): HasMany
    {
        return $this->hasMany(Conjoint::class);
    }
}
