<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plaza extends Model
{
    /** @use HasFactory<\Database\Factories\PlazaFactory> */
    use HasFactory;
    protected $fillable = ['idPlaza','nombrePlaza'];
}
