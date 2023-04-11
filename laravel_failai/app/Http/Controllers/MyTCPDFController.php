<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCPDF;

class MyTCPDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        // Retrieve form data from session
        $formData = session('formData');
        if ($formData == null) {
            // handle error here, e.g. redirect back to the form
        }
        $pdfData = $formData['pdfData'];

        // Output PDF to browser
        return response($pdfData)->header('Content-Type', 'application/pdf');
    }
}
