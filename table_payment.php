<?Php
require "dbconnect.php";//connection to database
require('fpdf185/fpdf.php');

//-----------------------------------------
//Add a GET so the table can be filtered
//-----------------------------------------

if (isset($_GET['q'])) {
    $search_query = $_GET['q']; // Get the searched name
} else {
    $search_query = "";
}

if (isset($_GET['apt_num'])) {
    $selected_apt_num = $_GET['apt_num'];
} else {
    $selected_apt_num = "";
}
if (!empty($selected_apt_num)) {
    $sql = "SELECT * FROM pay WHERE Apt_Num = '$selected_apt_num' AND (Pay_Concept LIKE '%$search_query%' OR Pay_Method LIKE '%$search_query%' OR Pay_Date LIKE '%$search_query%')";
} else {
    $sql = "SELECT * FROM pay WHERE Pay_Concept LIKE '%$search_query%' OR Pay_Method LIKE '%$search_query%' OR Pay_Date LIKE '%$search_query%'";
}



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
        // Line break
        $this->Ln(10);
    }
    function Footer(){
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        $this->SetDrawColor(72,150,212);
        $this->Line($this->GetX(), $this->GetY(), $this->GetPageWidth() - $this->GetX(), $this->GetY());
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    } 
    
}


$pdf = new PDF(); 
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);




$width_cell=array(25,60,65,20,20);
$pdf->SetFont('Arial','',14);


//Background color of header//
$pdf->SetFillColor(72, 150, 212);

// Header starts /// 
//First header column //
$pdf->Cell($width_cell[0],10,'Apartment',1,0,'C',true);
//Second header column//
$pdf->Cell($width_cell[1],10,'Content',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[2],10,'Description',1,0,'C',true); 
//Fourth header column//
$pdf->Cell($width_cell[3],10,'Method',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[4],10,'Amount',1,1,'C',true); 
//// header ends ///////

$pdf->SetFont('Arial','',12);
//Background color of header//
$pdf->SetFillColor(235,236,236); 
//to give alternate background fill color to rows// 
$fill=true;

$fontSize=12;

$tempFontSize=$fontSize;

/// each record is one row  ///
foreach ($db->query($sql) as $row) {
    $pdf->Cell($width_cell[0],10,$row['Apt_Num'],1,0,'C',$fill);
    
    $cellWidth=50;
    
    While($pdf->GetStringWidth($row['Pay_Concept']) > $width_cell[1]){
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell($width_cell[1],10,$row['Pay_Concept'],1,0,'L',$fill);
    $tempFontSize=$fontSize;
    $pdf->SetFontSize($fontSize);
    
    
    While($pdf->GetStringWidth($row['Pay_Description']) > $width_cell[2]){
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell($width_cell[2],10,$row['Pay_Description'],1,0,'L',$fill);
    $tempFontSize=$fontSize;
    $pdf->SetFontSize($fontSize);
    
    
    $pdf->Cell($width_cell[3],10,$row['Pay_Method'],1,0,'R',$fill);
    $pdf->Cell($width_cell[4],10,$row['Pay_Amount'],1,1,'R',$fill);
//to give alternate background fill  color to rows//
$fill = !$fill;
}
/// end of records ///

$pdf->Output();
?>