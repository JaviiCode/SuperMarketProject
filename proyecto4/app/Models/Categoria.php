<?php

namespace App\Models;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categoria';

    public function getProductos(){
        return $this->hasMany(Producto::class,"categoria_id", "id");
    }
}
