<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    use HasFactory;

    protected $table = 'detalle_factura';
    protected $primaryKey = ['id_factura', 'rut_cliente', 'cod_producto']; // Clave primaria compuesta
    public $incrementing = false; // No se incrementan automáticamente
    public $timestamps = false;

    protected $fillable = [
        'id_factura',
        'rut_cliente',
        'cod_producto',
        'cantidad',
        'precio',
    ];

    public function factura()
    {
        return $this->belongsTo(Factura::class, 'id_factura', 'id');
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
