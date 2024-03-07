<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;
// use PDF;

class InvoiceController extends Controller
{

    

public function generatePDF()
{
    $data = [
        // Any data you want to pass to the view
    ];

    $pdf = PDF::loadView('invoice', $data)
               ->setPaper('a4')
               ->setOptions([
                   'viewport-size' => '1024x768',
                   'margin-top' => 0,
                   'margin-right' => 0,
                   'margin-bottom' => 0,
                   'margin-left' => 0,
               ]);

    return $pdf->download('invoice.pdf');
}
    // public function generate(Request $request, $id)
    // {
    //     $reservations = reservation::where('id', $id)->get();

    //     // $pdf = view('invoice', compact('reservations'));
    //     // $pdf = Pdf::loadView('invoice', $reservetion);
    //     // return $pdf;
    //     $pdf = Pdf::loadView('invoice', compact('reservations'));
    //     $pdf->save('ticket.pdf');
    //  return 'Success!';
    //     // return $pdf->stream();
    //     // return $pdf->download('invoice.pdf');
    // }
}