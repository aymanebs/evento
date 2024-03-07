<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF()
    {
        // $data = ['title' => 'domPDF in Laravel 10'];
        $pdf = FacadePdf::loadView('ticket');
        return $pdf->download('document.pdf');
    }
}
