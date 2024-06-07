<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Spatie\LaravelPdf\Facades\Pdf;

class DownloadInvoiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Invoice $invoice)
    {
        return Pdf::view('pdfs.invoice', ['invoice' => $invoice])
            ->format('a4')
            ->name('invoice.pdf');
    }
}
