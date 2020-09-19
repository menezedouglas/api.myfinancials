<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoas extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'cpf',
        'idade',
        'estado',
        'pais',
        'registrado_por',
    ];

    public function usuario()
    {
        return $this->hasMany(Usuarios::class, 'pessoa_id', 'id');
    }

}
