<?php
require_once('tcpdf/tcpdf.php');

// Create new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Student Report Card');
$pdf->SetSubject('Student Report Card');
$pdf->SetKeywords('Student, Report Card');

// Set default header data
$pdf->SetHeaderData('', 0, '', '', array(0, 0, 0), array(255, 255, 255));

// Set header and footer fonts
$pdf->setHeaderFont(Array('helvetica', '', 10));
$pdf->setFooterFont(Array('helvetica', '', 8));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont('courier');

// Set margins
$pdf->SetMargins(15, 15, 15);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 15);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Set font
$pdf->SetFont('times', '', 12);

// Add a page
$pdf->AddPage();

// Get the HTML content
ob_start();
include('report_card.php'); // Replace 'report_card.php' with the filename of your HTML form
$html = ob_get_clean();

// Convert HTML to PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output the PDF as a file (optional)
$pdf->Output('report_card.pdf', 'F');




To convert the given HTML form into a PDF, you can use a server-side scripting language like PHP along with a PDF library such as TCPDF or mpdf. Here's an example using TCPDF:

Make sure to download the TCPDF library and place it in the same directory as your PHP file. Also, update the path to the HTML form file in the  include('report_card.php');  line. 
 
Once you run this PHP script, it will generate a PDF file named 'report_card.pdf' containing the converted form.