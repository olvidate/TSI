<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;

class Cliente extends Authenticable
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'clientes';
    protected $primaryKey = 'rut_cliente';
    protected $keyType  = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public $fillable = [
        'rol_id',
        'nombre',
        'apellido',
        'direccion',
        'num_tlf',
    ];

    public function rol():BelongsTo
    {
        return $this->belongsTo(Rol::class);
    }

}
