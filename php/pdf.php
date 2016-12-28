<?php
  function dajKorisnike() {
    $xml=simplexml_load_file("../xml/design.xml") or die("Error: Cannot create object");
    $designs = array();
    foreach ($xml->children() as $design) {
        $designs []= array( 'name' => $design->name,
          'author' => $design->author);
      }
    return $designs;
  }
?>
<?php
define('FPDF_FONTPATH',"fpdf/font/");
require("fpdf/fpdf.php");
  class PDF extends FPDF
  {
    function KorisniciTable($designs)
    {
      $this->SetFont('','B','24');
      $this->Cell(40,10,"Dizajnovi",15);
      $this->Ln();
      $this->Ln();
      $this->SetFont('','B','10');
      $this->SetFillColor(128,128,128);
      $this->SetTextColor(255);
      $this->SetDrawColor(92,92,92);
      $this->SetLineWidth(.3);
      $this->SetTextColor(255,255,255);
      $this->Cell(70,7,"Ime",1,0,'C',true);
      $this->Cell(70,7,"Autor",1,0,'C',true);
      $this->Ln();

      foreach($designs as $d)
      {
          $this->SetFont('','B','10');
          $this->SetTextColor(0,0,0);
          $this->Cell(70,7,$d['name'],1,0,'C',false);
          $this->Cell(70,7,$d['author'],1,0,'C',false);
          $this->Ln();
      }
    }
  }
?>
<?php
ob_start();
ob_clean();
  $pdf = new PDF();
  $pdf->AddPage();
  $pdf->SetFont('Arial','',10);
  $pdf->KorisniciTable(dajKorisnike());
  $pdf->Output();
  ob_end_flush();
?>
