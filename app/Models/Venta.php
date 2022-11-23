<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table='ventas';

    use HasFactory;
    protected $fillable = [
        'user_id',
        'estado',    //
        'total',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
