<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Productos;
use App\Models\User;

class Pedidos extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    public function usuarios(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function productos(): BelongsTo{
        return $this->belongsTo(Productos::class, 'prod_id', 'id');
    }
}
