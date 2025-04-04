<?php

namespace App\Http\Controllers;

use App\Models\InventoryMovement;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryMovementController extends Controller
{
    public function create(Product $product)
    {
        return view('inventory.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'type' => 'required|in:in,out',
            'notes' => 'nullable|string',
        ]);

        // Asegurarse de no bajar de 0 para los movimientos de salida
        if ($validated['type'] === 'out' && $product->quantity < $validated['quantity']) {
            return back()->withErrors(['quantity' => 'No hay suficientes artículos en stock.']);
        }

        DB::transaction(function () use ($product, $validated) {
            // Crear registro de movimiento
            InventoryMovement::create([
                'product_id' => $product->id,
                'quantity' => $validated['quantity'],
                'type' => $validated['type'],
                'notes' => $validated['notes'] ?? null,
            ]);

            // Actualizar cantidad del producto
            $newQuantity = $validated['type'] === 'in' 
                ? $product->quantity + $validated['quantity']
                : $product->quantity - $validated['quantity'];
            
            $product->update(['quantity' => $newQuantity]);
        });

        return redirect()->route('products.show', $product)
            ->with('success', 'Movimiento de inventario registrado con éxito.');
    }
}
