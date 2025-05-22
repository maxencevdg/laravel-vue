<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApiKey extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
        'name',
        'key',
    ];

    /**
     * Relation avec l'utilisateur propriétaire de la clé.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}