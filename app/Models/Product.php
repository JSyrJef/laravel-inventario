<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'quantity'
    ];

    public function inventoryMovements()
    {
        return $this->hasMany(InventoryMovement::class);
    }
}
