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
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(0,10,'Condo-Cristian',0,1,'C');
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
if(isset($_GET['q'])){
    $search_query = $_GET['q']; // Get the searched name
    $sql = "SELECT * FROM condo WHERE Apt_Num LIKE '%$search_query%' OR Apt_Name LIKE '%$search_query%' OR Apt_Last LIKE '%$search_query%'";
} else {
    $sql="select * from condo";
}

$pdf = new PDF(); 
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);




$width_cell=array(30,40,40,30,30);
$pdf->SetFont('Arial','B',16);


//Background color of header//
$pdf->SetFillColor(72, 150, 212);

// Header starts /// 
//First header column //
$pdf->Cell($width_cell[0],10,'Aprtment',1,0,'C',true);
//Second header column//
$pdf->Cell($width_cell[1],10,'Name',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[2],10,'Telephone',1,0,'C',true); 
//Fourth header column//
$pdf->Cell($width_cell[3],10,'Quota',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[4],10,'Debt',1,1,'C',true); 
//// header ends ///////

$pdf->SetFont('Arial','',14);
//Background color of header//
$pdf->SetFillColor(235,236,236); 
//to give alternate background fill color to rows// 
$fill=false;


/// each record is one row  ///
foreach ($db->query($sql) as $row) {
$pdf->Cell($width_cell[0],10,$row['Apt_Num'],1,0,'C',$fill);
$pdf->Cell($width_cell[1],10,$row['Apt_Name'],1,0,'L',$fill);
$pdf->Cell($width_cell[2],10,$row['Apt_Tel'],1,0,'L',$fill);
$pdf->Cell($width_cell[3],10,$row['Apt_Quota_Mon'],1,0,'R',$fill);
$pdf->Cell($width_cell[4],10,$row['Apt_Debt'],1,1,'R',$fill);
//to give alternate background fill  color to rows//
$fill = !$fill;
}
/// end of records ///

$pdf->Output();
?>