<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Persona extends Model
{
    use HasFactory;

    public function categoria()
    {
        //return $this->hasOne('App\Models\Categoria', 'id', 'categoria_id');
        return $this->belongsTo(Categoria::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
