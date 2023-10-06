<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedores';
    protected $primaryKey = 'cod_proveedor';
    protected $keyType = 'integer';
    public $incrementing = false;
    public $timestamps = false;

    public function productos():HasMany {
        return $this->hasMany(Producto::class);
    }
}
