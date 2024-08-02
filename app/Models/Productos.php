<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Pedidos;

class Productos extends Model
{
    use HasFactory;

    protected $table = 'productos';

    public function pedidos(): HasMany{
        return $this->hasMany(Pedidos::class, 'user_id', 'id');
    }
}
