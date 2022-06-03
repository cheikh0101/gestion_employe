<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prenom',
        'date_naissance',
        'membre',
        'conjoint',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date_naissance' => 'date',
        'membre' => 'integer',
        'conjoint' => 'integer',
    ];

    public function membre()
    {
        return $this->belongsTo(Membre::class);
    }

    public function conjoint()
    {
        return $this->belongsTo(Conjoint::class);
    }
}
