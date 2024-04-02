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
        $this->Cell(0,10,'Apartmet With Its Information',0,1,'C');
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




$width_cell=array(20,20,20,50,50,30);
$pdf->SetFont('Arial','B',16);


//Background color of header//
$pdf->SetFillColor(72, 150, 212);

// Header starts /// 
$pdf->Cell($width_cell[0],10,'Aprt',1,0,'L',true);
$pdf->Cell($width_cell[1],10,'Name',1,0,'L',true);
$pdf->Cell($width_cell[2],10,'Last',1,0,'L',true); 
$pdf->Cell($width_cell[3],10,'Post',1,0,'L',true);
$pdf->Cell($width_cell[4],10,'Email',1,0,'L',true); 
$pdf->Cell($width_cell[5],10,'Tele',1,1,'L',true); 


$pdf->SetFont('Arial','',12);
//Background color of header//
$pdf->SetFillColor(235,236,236); 
//to give alternate background fill color to rows// 
$fill=false;
$fontSize=14;
$tempFontSize=$fontSize;

/// each record is one row  ///
foreach ($db->query($sql) as $row) {
    
    $cellWidth=50;
$pdf->Cell($width_cell[0],10,$row['Apt_Num'],1,0,'C',$fill);
$pdf->Cell($width_cell[1],10,$row['Apt_Name'],1,0,'L',$fill);
$pdf->Cell($width_cell[2],10,$row['Apt_Last'],1,0,'L',$fill);

    
        $pdf->Cell($width_cell[3],10,$row['Apt_Postal'],1,0,'L',$fill);
       

    
        $pdf->Cell($width_cell[4],10,$row['Apt_Email'],1,0,'L',$fill);
     
$pdf->Cell($width_cell[5],10,$row['Apt_Tel'],1,1,'L',$fill);
//to give alternate background fill  color to rows//
$fill = !$fill;
}

/// end of records ///

$pdf->Output();
?>

While($pdf->GetStringWidth($row['Pay_Description']) > $width_cell[2]){
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell($width_cell[2],10,$row['Pay_Description'],1,0,'L',$fill);
    $tempFontSize=$fontSize;
    $pdf->SetFontSize($fontSize);
}