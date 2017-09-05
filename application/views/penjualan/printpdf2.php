<?php
require('fpdf/fpdf.php');

class pdf extends FPDF{
    function Header()
    {        
        $tes = "Data Pembelian";
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(45);
        // Title
        $this->Cell(100,10,$tes,1,0,'C');
        // Line break
        $this->Ln(20);
    }
}


$num = 0;

$no = "";
$col_barang = "";
$col_jumlah = "";
$col_qty = "";
$total = 0;
$nomor = 1;

foreach($item as $row)
{    
    $name = substr($row["nama_barang"],0,20);
    $qt = $row['qty'];
    $real_price = $row["jumlah"];
    $price_to_show = number_format($row["jumlah"]);
    
    $no = $no.$nomor."\n";
    $col_barang = $col_barang.$name."\n";
    $col_qty = $col_qty.$qt."\n";
    $col_jumlah = $col_jumlah.$price_to_show."\n";
   
    $total = $total+$real_price;
    $nomor++;
    $num ++;
}

$total = number_format($total);

//Create a new PDF file
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetTitle("Data Pembelian  : ".$id);
//Fields Name position
$Y_Fields_Name_position = 34;
//Table position, under Fields Name
$Y_Table_Position = 40;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(35);
$pdf->Cell(20,6,'Nomor',1,0,'C',1);
$pdf->SetX(55);
$pdf->Cell(50,6,'Nama Barang',1,0,'C',1);
$pdf->SetX(105);
$pdf->Cell(30,6,'Quantity',1,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(40,6,'Total Belanja',1,0,'C',1);
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(35);
$pdf->MultiCell(20,6,$no,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(55);
$pdf->MultiCell(50,6,$col_barang,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(105);
$pdf->MultiCell(30,6,$col_qty,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(135);
$pdf->MultiCell(40,6,$col_jumlah,1,'R');
$pdf->SetX(135);
$pdf->MultiCell(40,6,'Rp. '.$total,1,'R');

//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $num)
{
    $pdf->SetX(35);
    $pdf->MultiCell(140,6,'',1);
    $i = $i +1;
}

$pdf->Output();
?>