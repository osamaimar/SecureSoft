<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_number',
        'due_date',
        'notes',
    ];
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($invoice) {
            $invoice->invoice_number = self::generateUniqueInvoiceNumber();
        });
    }
    private static function generateUniqueInvoiceNumber()
    {
        do {
            $invoiceNumber = 'INV-' . Str::upper(Str::random(10));
        } while (self::where('invoice_number', $invoiceNumber)->exists());

        return $invoiceNumber;
    }


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    
}
