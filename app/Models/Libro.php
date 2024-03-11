<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Libro extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'archivo',
        'unidad_id',
    ];


    
    public function unidad(): BelongsTo
    {
        return $this->belongsTo(Unidad::class);
    }
}
