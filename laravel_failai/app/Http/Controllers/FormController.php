<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCPDF;

class FormController extends Controller
{
    public function processForm(Request $request)
    {
        $name = $request->input('name');
        $surname = $request->input('surname');
        $date = $request->input('date');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');
        $modelis = $request->input('modelis');
        $remoSpalva = $request->input('remo-spalva');
        $dazymoTipas = $request->input('dazymo-tipas');
        $dangosTipas = $request->input('dangosTipas');
        $gs = $request->input('gs');
        $atramuTvirtinimoTipas = $request->input('atramu-tvirtinimo-tipas');
        $atmetimai = $request->input('atmetimai');
        $dangteliai = $request->input('dangteliai');
        $atramusSkaicius = $request->input('atramusSkaicius');
        $namoSiena = $request->input('namoSiena');
        $grindinioTipas = $request->input('grindinioTipas');
        $papildomiDarbai = $request->input('papildomiDarbai');
        $h1 = $request->input('h1');
        $h2 = $request->input('h2');
        $w = $request->input('w');
        $l = $request->input('l');

        // If the selected modelis option is "papildomasModelis", get the value of the papildomasModelis-comment input
        if ($modelis === "papildomasModelis") {
            $modelis = $request->input('papildomasModelis-comment');
        }

        // If the selected remoSpalva option is "papildomaRemoSpalva", get the value of the papildomaRemoSpalva-comment input
        if ($remoSpalva === "papildomaRemoSpalva") {
            $remoSpalva = $request->input('papildomaRemoSpalva-comment');
        }

        // If the selected dazymoTipas option is "papildomasDazymoTipas", get the value of the papildomasDazymoTipas-comment input
        if ($dazymoTipas === "Papildomas-dazymo-tipas") {
            $dazymoTipas = $request->input('papildomas-dazymo-tipas-comment');
        }

        // If the selected dazymoTipas option is "papildomasDazymoTipas", get the value of the papildomasDazymoTipas-comment input
        if ($dangosTipas === "papildoma-danga") {
            $dangosTipas = $request->input('papildoma-danga-comment');
        }
        // If the selected dazymoTipas option is "papildomasDazymoTipas", get the value of the papildomasDazymoTipas-comment input
        if ($gs === "papildomasGs") {
            $gs = $request->input('papildomasGs-comment');
        }
        // If the selected atramuTvirtinimoTipas option is "papildomasAtramuTvirtinimoTipas", get the value of the papildomas-atramu-tvirtinimo-tipas-comment input
        if ($atramuTvirtinimoTipas === "papildomasAtramuTvirtinimoTipas") {
            $atramuTvirtinimoTipas = $request->input('papildomas-atramu-tvirtinimo-tipas-comment');
        }

        // Generate a PDF preview of the form data
        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('PDF Title');
        $pdf->SetSubject('PDF Subject');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        $pdf->SetFont('helvetica', '', 12);

        $content = view('testine', [
            'name' => $name,
            'surname' => $surname,
            'date' => $date,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'modelis' => $modelis,
            'remoSpalva' => $remoSpalva,
            'dazymoTipas' => $dazymoTipas,
            'dangosTipas' => $dangosTipas,
            'gs' => $gs,
            'atramuTvirtinimoTipas' => $atramuTvirtinimoTipas,
            'atmetimai' => $atmetimai,
            'dangteliai' => $dangteliai,
            'atramusSkaicius' => $atramusSkaicius,
            'namoSiena' => $namoSiena,
            'grindinioTipas' => $grindinioTipas,
            'papildomiDarbai' => $papildomiDarbai,
            'l' => $l,
            'w' => $w,
            'h1' => $h1,
            'h2' => $h2,

        ])->render();


        $pdf->writeHTML($content, true, false, true, false, '');

        $pdfData = $pdf->Output('form.pdf', 'S');

        // Store the form data and PDF preview in the session
        $formData = [
            'name' => $name,
            'surname' => $surname,
            'date' => $date,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'modelis' => $modelis,
            'remoSpalva' => $remoSpalva,
            'dazymoTipas' => $dazymoTipas,
            'dangosTipas' => $dangosTipas,
            'gs' => $gs,
            'atramuTvirtinimoTipas' => $atramuTvirtinimoTipas,
            'atmetimai' => $atmetimai,
            'dangteliai' => $dangteliai,
            'atramusSkaicius' => $atramusSkaicius,
            'namoSiena' => $namoSiena,
            'grindinioTipas' => $grindinioTipas,
            'papildomiDarbai' => $papildomiDarbai,
            'l' => $l,
            'w' => $w,
            'h1' => $h1,
            'h2' => $h2,
            'pdfData' => $pdfData,
        ];

        session()->put('formData', $formData);

        // Return the view with the form data and PDF preview
        return redirect('/2');
    }
}
