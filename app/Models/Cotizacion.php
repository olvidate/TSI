<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 'cotizaciones';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'rut_cliente',
        'fecha',
        'estado',
        'precio_envio',
        'monto_neto',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'rut_cliente', 'rut_cliente');
    }

    public function detallesCotizacion()
    {
        return $this->hasMany(DetalleCotizacion::class, 'id_cotizacion', 'id');
    }
}
