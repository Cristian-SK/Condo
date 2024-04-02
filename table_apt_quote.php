<?Php
require "dbconnect.php";//connection to database
require('fpdf185/fpdf.php');

//-----------------------------------------
//Add a GET so the table can be filtered
//-----------------------------------------


class PDF extends FPDF{
    function Header(){
        //LOGo if i get to add it
        //$this->Imgage('logo call here',10,6,30);
        $this->SetFont('Arial','B',40);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(0,10,'Condo-Cristian',0,1,'C');
        $this->SetDrawColor(72,150,212);
        $this->Line($this->GetX(), $this->GetY(), $this->GetPageWidth() - $this->GetX(), $this->GetY());
        
        $this->SetFont('Arial','I',12);
        $this->Cell(0,10,'Apartmet With Debts Information',0,1,'C');
        $this->SetDrawColor(72,150,212);
        $this->Line($this->GetX(), $this->GetY(), $this->GetPageWidth() - $this->GetX(), $this->GetY());
        // Line break
        $this->Ln(20);
    }
    function Footer(){
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    } 
    
}

$sql = "SELECT * FROM condo";

$pdf = new PDF(); 
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);




$width_cell=array(30,30,30,40,30,30);
$pdf->SetFont('Arial','B',16);


//Background color of header//
$pdf->SetFillColor(72, 150, 212);

// Header starts /// 
//First header column //
$pdf->Cell($width_cell[0],10,'Aprtment',1,0,'C',true);
$pdf->Cell($width_cell[1],10,'Name',1,0,'C',true);
$pdf->Cell($width_cell[2],10,'Telephone',1,0,'C',true); 
$pdf->Cell($width_cell[3],10,'Email',1,0,'C',true);
$pdf->Cell($width_cell[4],10,'Quota',1,0,'C',true); 
$pdf->Cell($width_cell[5],10,'Debt',1,1,'C',true); 
//// header ends ///////

$pdf->SetFont('Arial','',12);
//Background color of header//
$pdf->SetFillColor(235,236,236); 
//to give alternate background fill color to rows// 
$fill=false;
$fontSize=12;
$tempFontSize=$fontSize;

/// each record is one row  ///
foreach ($db->query($sql) as $row) {
$pdf->Cell($width_cell[0],10,$row['Apt_Num'],1,0,'C',$fill);
$pdf->Cell($width_cell[1],10,$row['Apt_Name'],1,0,'L',$fill);
$pdf->Cell($width_cell[2],10,$row['Apt_Tel'],1,0,'L',$fill);
While($pdf->GetStringWidth($row['Apt_Email']) > $width_cell[2]){
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
        $pdf->Cell($width_cell[3],10,$row['Apt_Email'],1,0,'C',$fill);
        $tempFontSize=$fontSize;
        $pdf->SetFontSize($fontSize);
$pdf->Cell($width_cell[4],10,$row['Apt_Quota_Mon'],1,0,'R',$fill);
$pdf->Cell($width_cell[5],10,$row['Apt_Debt'],1,1,'R',$fill);
//to give alternate background fill  color to rows//
$fill = !$fill;
}
/// end of records ///

$pdf->Output();
?>