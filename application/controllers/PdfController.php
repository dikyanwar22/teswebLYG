<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PdfController extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->library('Pdf');
    }

    //=== untuk menampilkan PDF ===//
    public function index() {
        $html = $this->load->view('pdf', [], true);
        $this->show_pdf($html, 'output_filename');
    }

    protected function show_pdf($html, $filename = '', $paper_size = 'A4', $orientation = 'portrait') {
        $pdf = new TCPDF($orientation, 'mm', $paper_size, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle($filename);
        $pdf->SetHeaderData('', 0, '', '', array(0, 0, 0), array(0, 0, 0));
        $pdf->setFooterData(array(0, 0, 0), array(0, 0, 0));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetAutoPageBreak(TRUE, 10);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output($filename . '.pdf', 'I');
    }
    //=== untuk menampilkan PDF ===//


    //=== untuk generate PDF ===//

    public function generate_PDF() {
        // Get your HTML content from the view
        $html = $this->load->view('admin/baru', [], true);
        // Generate PDF
        $this->automatic_gen_save_PDF($html, 'output_filename');
    }

    public function automatic_gen_save_PDF($html, $filename = '', $paper_size = 'A4', $orientation = 'portrait') {
        $pdf = new TCPDF($orientation, 'mm', $paper_size, true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle($filename);
        $pdf->SetHeaderData('', 0, '', '', array(0, 0, 0), array(0, 0, 0));
        $pdf->setFooterData(array(0, 0, 0), array(0, 0, 0));

        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        $pdf->SetMargins(10, 10, 10);
        $pdf->SetAutoPageBreak(TRUE, 10);

        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output($_SERVER['DOCUMENT_ROOT'] . 'artikel/public/generate/save_PDF.pdf', 'F');
         echo 'PDF Berhasil dibuat!';
    }

    //=== untuk generate PDF ===//

















    //yang dibawah ini generate PDF susah dipelajari
    public function gene_pdf() {
        // Create a PDF document
        $pdf = new TCPDF();
        $pdf->AddPage();

        // Set content for the PDF (replace this with your content)
        $content = 'Hello, this is a PDF generated using TCPDF in CodeIgniter 3.';
        $pdf->writeHTML($content, true, false, true, false, '');

        // Output the PDF as a download
        $pdf->Output('custom-name.pdf', 'D');
    }

    public function toFolder() {
        // Create a TCPDF object
        $pdf = new TCPDF();

        // Set PDF content
        $pdf->SetFont('times', '', 12);
        $pdf->AddPage();
        $pdf->Cell(0, 10, 'Hallo Diky Anwar', 0, 1, 'C');

        // Save PDF to folder
         // $pdf->Output(__DIR__ . '_savePDF.pdf', 'F');
        $pdf->Output($_SERVER['DOCUMENT_ROOT'] . 'artikel/public/generate/save_PDF.pdf', 'F');
         echo 'PDF Berhasil dibuat!';
    }

}