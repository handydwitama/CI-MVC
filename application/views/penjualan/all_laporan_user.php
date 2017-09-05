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


        <div class="col-sm-8 text-left"> 
            <center> 
            <h3>MENAMPILKAN DATA PEMBELIAN USER : <?php echo $nama; ?></h3>
            <br>         
            <table align="center" border='1' Width='800'>  
            <tr>
                <th class = "text-center"> ID Transaksi </th>
                <th style="width:20%" class = "text-center"> Tanggal </th>
                
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
            foreach($item as $row)
            {                
            echo " 
            <tr>
            <td align='center'>".$row['id_pembelian']."</td>
            <td align='center'>".$row['tanggal']."</td>                    
            <td align='center'>".$row['nama_barang']."</td>
            <td align='center'><input type='number' id='num[]' name='".$row['nama_barang']."' min='1' max='10' step='1' value=".$row['qty']."></td>
            <td align='center'>".$row['jumlah']."</td>
            <td align='center'>
            <a href='http://handy.orange.com/crud/removelist.php?id=".$row['id_pembelian']."&barang=".$row['nama_barang']."&nama=".$nama."'>Hapus</a>
            </td>
            </tr>";
            $no++;
            }
            ?>
            </table>
            
            <br><br>
            <?php
            echo "<a href='http://handy.orange.com/CodeIgniter-3.1.5/crud/laporan/printpdf1.php?nama=".$nama."'>Print PDF</a>";

            ?>
            <br>
            <br>

            <input type="button" onclick="location.href='http://handy.orange.com/CodeIgniter-3.1.5/crud/laporan/user';" value="Back" />
        </div>
        



</body>
</html>
