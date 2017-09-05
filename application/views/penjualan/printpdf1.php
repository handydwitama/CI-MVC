<?php
require('fpdf/fpdf.php');


class pdf extends FPDF{
    
    function Header()
    {
        
        $tes = "TABLE";
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

$col_id = "";
$col_tanggal = "";
$col_barang = "";
$col_qty = "";
$col_jumlah = "";
$total = 0;


foreach($item as $row)
{
    $code = $row["id_pembelian"];
    $name = substr($row["nama_barang"],0,20);
    $tgl = $row['tanggal'];
    $qt = $row['qty'];
    $real_price = $row["jumlah"];
    $price_to_show = number_format($row["jumlah"]);

    $col_id = $col_id.$code."\n";
    $col_tanggal = $col_tanggal.$tgl."\n";
    $col_barang = $col_barang.$name."\n";
    $col_qty = $col_qty.$qt."\n";
    $col_jumlah = $col_jumlah.$price_to_show."\n";

   
    $total = $total+$real_price;
    $num ++;
}


$total = number_format($total);

//Create a new PDF file
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetTitle("Data Pembelian User : ".$nama);
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
$pdf->SetX(20);
$pdf->Cell(40,6,'ID Transaksi',1,0,'C',1);
$pdf->SetX(60);
$pdf->Cell(50,6,'Tanggal',1,0,'C',1);
$pdf->SetX(110);
$pdf->Cell(30,6,'Nama Barang',1,0,'C',1);
$pdf->SetX(140);
$pdf->Cell(25,6,'Quantity',1,0,'C',1);
$pdf->SetX(165);
$pdf->Cell(30,6,'Total Belanja',1,0,'R',1);
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(40,6,$col_id,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(60);
$pdf->MultiCell(50,6,$col_tanggal,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(110);
$pdf->MultiCell(30,6,$col_barang,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(140);
$pdf->MultiCell(25,6,$col_qty,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(165);
$pdf->MultiCell(30,6,$col_jumlah,1,'R');
$pdf->SetX(165);
$pdf->MultiCell(30,6,'Rp. '.$total,1,'R');

//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $num)
{
    $pdf->SetX(20);
    $pdf->MultiCell(175,6,'',1);
    $i = $i +1;
}

$pdf->Output();
?>