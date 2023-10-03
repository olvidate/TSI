<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'productos';
    protected $primaryKey = 'cod_producto';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function categoria():BelongsTo {
        return $this->belongsTo(Categoria::class);
    }

    public function proveedor():BelongsTo {
        return $this->belongsTo(Proveedor::class);
    }

    public function tallas():BelongsToMany {
        return $this->belongsToMany(Talla::class);
    }

    public function colores():BelongsToMany {
        return $this->belongsToMany(Talla::class);
    }
}
