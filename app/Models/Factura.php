<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'rut_cliente',
        'id_cotizacion',
        'fecha_emision',
        'monto_neto',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'rut_cliente', 'rut_cliente');
    }

    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class, 'id_cotizacion', 'id');
    }

    public function detallesFactura()
    {
        return $this->hasMany(DetalleFactura::class, 'id_factura', 'id');
    }
}
