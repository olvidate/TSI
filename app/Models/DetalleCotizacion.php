<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCotizacion extends Model
{
    use HasFactory;

    protected $table = 'detalle_cotizacion';
    protected $primaryKey = ['id_cotizacion', 'rut_cliente', 'cod_producto']; // Clave primaria compuesta
    public $incrementing = false;

    protected $fillable = [
        'id_cotizacion',
        'rut_cliente',
        'cod_producto',
        'cantidad_producto',
        'precio_producto',
    ];

    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class, 'id_cotizacion', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'rut_cliente', 'rut_cliente');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'cod_producto', 'cod_producto');
    }
}
