<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unidad extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'unidad_padre_id','curso_id'];

    public function subunidades()
    {
        return $this->hasMany(Unidad::class, 'unidad_padre_id');
    }

    public function unidadPadre()
    {
        return $this->belongsTo(Unidad::class, 'unidad_padre_id');
    }

   
    public function libros(): HasMany
    {
        return $this->hasMany(Libro::class);
    }


}
