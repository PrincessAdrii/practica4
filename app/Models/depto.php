<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class depto extends Model
{
    use HasFactory;

    public function carreras():HasMany{
        return $this->hasMany(Carrera::class);
    }
}
