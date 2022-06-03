<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
