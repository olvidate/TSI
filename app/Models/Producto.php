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
        return $this->belongsTo(Categoria::class, 'cod_categoria');
    }

    public function proveedor():BelongsTo {
        return $this->belongsTo(Proveedor::class);
    }

    public function tallas(): BelongsTo
    {
        return $this->belongsTo(Talla::class, 'id_talla');
    }

    public function colores(): BelongsTo
    {
        return $this->belongsTo(Color::class, 'id_color');
    }
}
