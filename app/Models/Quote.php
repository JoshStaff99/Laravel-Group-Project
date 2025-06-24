<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QuoteItem;
use App\Models\Product;

class Quote extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Access all quote items (line items)
    public function items()
    {
        return $this->hasMany(QuoteItem::class);
    }

    // Access all products through quote items
    public function products()
    {
        return $this->hasManyThrough(Product::class, QuoteItem::class);
    }

    // Computed subtotal (sum of item totals)
    public function getSubtotalAttribute()
    {
        return $this->items->sum(fn($item) => $item->quantity * $item->product->price);
    }

    // Computed VAT (20%)
    public function getVatTotalAttribute()
    {
        return $this->subtotal * 0.2;
    }

    // Computed grand total
    public function getTotalAttribute()
    {
        return $this->subtotal + $this->vat_total;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}