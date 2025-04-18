<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'type', // 'in' or 'out'
        'notes'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
