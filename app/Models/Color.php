<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Color extends Model
{
    use HasFactory;
    protected $table = 'colores';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];
    public function productos():HasMany {
        return $this->hasMany(Producto::class);
    }
}
