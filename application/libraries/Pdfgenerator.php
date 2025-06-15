<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php'; // Load autoload Composer

use Spipu\Html2Pdf\Html2Pdf;

class Pdfgenerator {
    public function generate($html, $filename) {
        try {
            $pdf = new Html2Pdf('P', 'A4', 'en');
            $pdf->writeHTML($html);
            $pdf->output($filename, 'F'); // Simpan sebagai file
        } catch (Exception $e) {
            throw new Exception("Gagal membuat PDF: " . $e->getMessage());
        }
    }
}
?>
