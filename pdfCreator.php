<?php
        include './DAPHP.php';
        include './fpdf/diag.php';
// Begin configuration

$textColour = array( 0, 0, 0 );
$headerColour = array( 100, 100, 100 );
$tableHeaderTopTextColour = array( 255, 255, 255 );
$tableHeaderTopFillColour = array( 125, 152, 179 );
$tableHeaderTopProductTextColour = array( 0, 0, 0 );
$tableHeaderTopProductFillColour = array( 143, 173, 204 );
$tableHeaderLeftTextColour = array( 99, 42, 57 );
$tableHeaderLeftFillColour = array( 184, 207, 229 );
$tableBorderColour = array( 50, 50, 50 );
$tableRowFillColour = array( 213, 170, 170 );
$name = "Hakan O. Vural";
$title = "Computer Engineer";
$reportNameYPos = 30;
$logoFile = "./images/hov.jpg";
$logoXPos = 15;
$logoYPos = 20;
$sqrXpos1=15;
$sqrXpos2=75;
$sqrYpos1=20;
$sqrYpos2=80;
$logoWidth = 60;
$columnLabels = array( "Q1", "Q2", "Q3", "Q4" );
$rowLabels = array( "SupaWidget", "WonderWidget", "MegaWidget", "HyperWidget" );
$chartXPos = 20;
$chartYPos = 250;
$chartWidth = 160;
$chartHeight = 80;
$chartXLabel = "Product";
$chartYLabel = "2009 Sales";
$chartYStep = 20000;

$chartColours = array(
                  array( 255, 100, 100 ),
                  array( 100, 255, 100 ),
                  array( 100, 100, 255 ),
                  array( 255, 255, 100 ),
                );

$data = array(
          array( 9940, 10100, 9490, 11730 ),
          array( 19310, 21140, 20560, 22590 ),
          array( 25110, 26260, 25210, 28370 ),
          array( 27650, 24550, 30040, 31980 ),
        );

// End configuration


function setTitleRed($text, $pdf, $imgSrc){
    $yCor = $pdf->GetY() + 12;
    $xCor = $pdf->GetX() + 6;
    $pdf->SetFont( 'Arial', 'B', 16 );
    $pdf->SetTextColor(170,0,0);
    $pdf->Image($imgSrc, $xCor, $yCor - 9, 8, 8);
    $pdf->Cell( 12, 15, "", 0, 0, 'L' );
    $pdf->Cell( 0, 15, "   ".$text, 0, 1, 'L' );
    $pdf->SetDrawColor(170,0,0);
    $pdf->SetLineWidth(0.6);
    $pdf->Line(15,$yCor,190,$yCor);

}

function setRowInfo($text1 , $text2 , $space, $pdf){
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont( 'Arial', 'B', 13 );
    $pdf->Cell( $space, 10, "   ".$text1."   ", 0, 0, 'L' );
    $pdf->SetFont( 'Arial', '', 13 );
    $pdf->Cell( $space, 10, "   ".$text2, 0, 1, 'L' );
}

function setRowInfo2($text1 , $text2 , $space, $pdf){
    $pdf->SetTextColor(70,70,70);
    $pdf->SetFont( 'Arial', 'B', 13 );
    $pdf->Cell( $space, 10, "   ".$text1."   ", 0, 0, 'L' );
    $pdf->SetFont( 'Arial', '', 13 );
    $pdf->Cell( $space, 10, "   ".$text2, 0, 1, 'L' );
}

function setSquare($x1,$x2,$y1,$y2,$R,$G,$B,$lineWidth,$pdf){
    $pdf->SetDrawColor($R,$G,$B);
    $pdf->SetLineWidth($lineWidth);
    $pdf->Line($x1,$y1,$x1,$y2);
    $pdf->Line($x1,$y1,$x2,$y1);
    $pdf->Line($x2,$y1,$x2,$y2);
    $pdf->Line($x2,$y2,$x1,$y2);  
}

function infoSquare($y1, $y2, $rowInfo,$rowInfo2, $content ,$pdf){
    $pdf->SetMargins(20, 10);
    setSquare(15, 190, $y1, $y2 ,170, 0, 0, 0.60, $pdf);
    $pdf->Ln(10);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont( 'Arial', 'B', 13 );
    $pdf->Write(7 , $rowInfo);
    $pdf->Ln(7);
    $pdf->SetTextColor(75,75,75);
    $pdf->Write(7, $rowInfo2);
    $pdf->Ln(7);
    $pdf->SetFont( 'Arial', '', 13 );
    $pdf->SetTextColor(100,100,100);
    $pdf->Write( 7, $content);
    $pdf->SetMargins(10, 10);
    $pdf->Ln(20);
}

function infoSquareEducation($y1, $y2, $rowInfo,$rowInfo2,$pdf){
    $pdf->SetMargins(20, 10);
    setSquare(15, 190, $y1, $y2 ,170, 0, 0, 0.60, $pdf);
    $pdf->Ln(10);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont( 'Arial', 'B', 13 );
    $pdf->Write(7 , $rowInfo);
    $pdf->Ln(7);
    $pdf->SetTextColor(75,75,75);
    $pdf->Write(7, $rowInfo2);
    $pdf->SetMargins(10, 10);
    $pdf->Ln(15);
}

/**
  Create the title page
**/

$pdf = new FPDF( 'P', 'mm', 'A4' );
$diag = new PDF_Diag();
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->AddPage();

// Logo
$pdf->Image( $logoFile, $logoXPos, $logoYPos, $logoWidth);
setSquare($sqrXpos1, $sqrXpos2, $sqrYpos1, $sqrYpos2,170, 0, 0, 1.5, $pdf);

// Report Name
$pdf->SetFont( 'Arial', 'B', 24 );
//$pdf->Ln( $reportNameYPos );
$pdf->Ln(15);
$pdf->Cell(70,10,"",0,0,'L');
$pdf->Cell( 0, 10, $name, 0, 1, 'L' );
$pdf->Cell(70,10,"",0,0,'L');
$pdf->SetFont( 'Arial', 'B', 16 );
$pdf->Cell( 0, 15, $title, 0, 1, 'L' );
$pdf->Ln(30);
$contImg = "./images/arrow.png";
setTitleRed("Contact informations ", $pdf, $contImg);
$ps = 40;

setRowInfo("Email", "hakanovural@gmail.com", $ps, $pdf);
setRowInfo("Phone", "+90 (506) 456 02 37", $ps, $pdf);
setRowInfo("Adress", "Cumhuriyet Mah. 1983 Sk. Alara City Residans ", $ps, $pdf);
setRowInfo("", "Kat 2 No 9 ESENYURT / ISTANBUL", $ps, $pdf);

setTitleRed("Personal Informations", $pdf, $contImg);

setRowInfo("Marital Status", "Single", $ps, $pdf);
setRowInfo("Nationality", "Turkey Republic", $ps, $pdf);
setRowInfo("Military Service", "Delayed", $ps, $pdf);
setRowInfo("Identity Number", "31823109434", $ps, $pdf);
setRowInfo("Birth date", "07 Sep. 1993", $ps, $pdf);
setRowInfo("Birth Place", "Turkey - ANKARA", $ps, $pdf);
setRowInfo("Driver Licence", "None", $ps, $pdf);

setTitleRed("About me", $pdf,$contImg);
$pdf->SetFont( 'Arial', '', 13 );
$pdf->SetTextColor(0,0,0);
$pdf->SetMargins(15, 10);
$pdf->Cell(5);
$pdf->Write( 7, "As a person who use computer for almost 20 years I can say I grow up with the computers. I always wanted to be a computer engineer and worked hard for this. I love programming, analizing, designing and resarching." );
$pdf->SetMargins(10, 10);
$pdf->AddPage();

setTitleRed("Work History", $pdf,$contImg);
setRowInfo("Total Experience", "About 1 year", $ps, $pdf);
setRowInfo("Working Status", "Not working", $ps, $pdf);
setRowInfo("Internship Info", "", $ps, $pdf);

infoSquare(60, 100, "Recep Tayyip Erdogan University - Generral Internship",
        "20.07.2015 - 28.08.2015 | Rize - Turkey", 
        "I worked in web development department and use PHP programming language."
        . " I created my own personal blog site and learned JavaScript(Jquery), Ajax and CSS.", $pdf);
setTitleRed("Education History", $pdf,$contImg);
setRowInfo("Education Status", "University graduate ", $ps, $pdf);
setRowInfo("Education History", "", $ps, $pdf);

infoSquareEducation(148, 170, "Konuralp Anatolian High School - High School",
        "15.09.2007 - 15.06.2011 | Kutahya - Turkey", $pdf);

infoSquareEducation(180, 200, "Yildiz Technical University - Computer Engineering (Bachelor's Degree)",
        "30.08.2014 - ??? | Istanbul - Turkey", $pdf);

setTitleRed("Foreign Languages", $pdf,$contImg);
$pdf->SetTextColor(50,50,50);
$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(50, 15, "", 0, 0, 'L');
$pdf->Cell(45, 15, "Reading", 0, 0, 'C');
$pdf->Cell(45, 15, "Speaking", 0, 0, 'C');
$pdf->Cell(45, 15, "Writing", 0, 1, 'C');
$pdf->Cell(50, 15, "    English", 0, 0, 'L');
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(45, 15, "Very Good", 0, 0, 'C');
$pdf->Cell(45, 15, "Good", 0, 0, 'C');
$pdf->Cell(45, 15, "Very Good", 0, 1, 'C');

$pdf->AddPage();


$result1 = selectDBnof("*", "professions", "1");

setTitleRed("Professions", $pdf,$contImg);

$pdf->SetTextColor(50,50,50);
$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(70, 15, "", 0, 0, 'L');
$pdf->Cell(45, 15, "Theoretical", 0, 0, 'C');
$pdf->Cell(45, 15, "Practical", 0, 1, 'C');

//$rCol = 240;
//$gCol = 0;
//$bCol = 0;
while($row = mysqli_fetch_array($result1)){
    $title = $row['title'];
    $theory = $row['teori'];
    $practical = $row['pratik'];
    
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(70, 15, $title, 0, 0, 'C');
    $pdf->SetFont('Arial', '', 13);
    $pdf->Cell(45, 15, $theory, 0, 0, 'C');
    $pdf->Cell(45, 15, $practical, 0, 1, 'C');
//    $teoVal[] = $theory;
//    $praVal[] = $practical;
//    $Color[] = array($rCol , $gCol , $bCol);
//    if($rCol >=20){
//    $rCol -=20;
//    } else
//    {
//        if ($gCol <= 240){
//            $rcol = 240;
//            $gCol += 20;
//        } else if($bCol <=240) {
//            $rcol = 240;
//            $gCol = 0;
//            $bCol += 20;
//        } else
//        {
//            $rcol = 240;
//            $gCol = 0;
//            $bCol = 0;
//        }
//    }
}

$pdf->ln(10);
//$pdf->Cell(0, 10, "Theorectical Pie Chart", 0, 1, "C");
//
//$diag->PieChart(100, 35, $teoVal, '%l (%p)', $Color);
setTitleRed("Projects", $pdf,$contImg);

$pdf->SetLeftMargin(15);
$pdf->SetTextColor(50,50,50);
$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(45, 15, "Project", 0, 0, 'L');
$pdf->Cell(125, 15, "Info", 0, 1, 'C');

$result2 = selectDBnof("*", "projects", "1");

while($row = mysqli_fetch_array($result2)){
    $title = $row['title'];
    $summary = $row['summary'];
    $link = $row['link'];
    
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(45, 15, $title, 0, 0, 'L', false, $link);
    $pdf->SetFont('Arial', '', 13);
    $pdf->MultiCell(125, 15, $summary, 0);

}

$pdf->Output( "Hakan_Oğuz_Vural_CV.pdf", "I" );
