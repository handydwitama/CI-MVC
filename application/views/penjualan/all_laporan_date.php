<!DOCTYPE html>
<html lang="en">
<?php
    if (isset($this->session->userdata['logged_in'])) {
        $username = ($this->session->userdata['logged_in']['username']);
        $email = ($this->session->userdata['logged_in']['email']);
    } else {
         header("location: http://handy.orange.com/CodeIgniter-3.1.5/crud/login");
    }
?>
<head>
    <title>Transaksi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
</head>
<body>
    <?php 
        foreach($item as $get){
            $tgl = $get['tanggal'];
            $nm = $get['nama'];
        }
    ?>
        <div class="col-sm-8 text-left"> 
            <center> 
            MENAMPILKAN DATA TRANSAKSI :
            <br>
            <br>
            <p> <?php echo "ID Transaksi = ".$id."<br>User = ".$nm."<br>Tanggal = ".$tgl ; ?></p>
            <br>            
            <table border='1' Width='800'>  
            <tr>
                <th class = "text-center"> Nomor </th>
                <th class = "text-center"> Nama Barang </th>
                <th class = "text-center"> Quantity </th>
                <th class = "text-center"> Total Belanja </th>
                <th class = "text-center"> Action </th>            
            </tr>            
            <script type="text/javascript">
            var quan = document.getElementById('num[]');
            var asd = quan[0].innerHTML;
            </script>
            <?php  
            $no = 1;            
            foreach ($item as $row)
            {                
                echo " <tr>
                <td><center>".$no."</center></td>
                <td><center>".$row['nama_barang']."</td>
                <td><center><input type='number' id='num[]' name='".$row['nama_barang']."' min='1' max='10' step='1' value=".$row['qty']."></td>
                <td><center>".$row['jumlah']."</td>
                <td><center>
                <a href='http://handy.orange.com/crud/removelaporan.php?id=".$row['id_pembelian']."&barang=".$row['nama_barang']."&nama=".$id."'>Hapus</a>
                </td></center>
                </tr>";
                $no++;
            }            
            ?>
            </table>
            <br><br>
            <?php
             echo "<a href='http://handy.orange.com/CodeIgniter-3.1.5/crud/laporan/printpdf2.php?id=".$id."'>Print PDF</a>";
            
            ?>
            <br><br>         
            <input type="button" onclick="location.href='http://handy.orange.com/CodeIgniter-3.1.5/crud/laporan/date';" value="Back" />
        </div>
        
</body>
</html>
