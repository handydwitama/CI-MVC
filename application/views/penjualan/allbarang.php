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
            <?php
                if (isset($message_display)) {
                    echo "<center>";
                    echo "<h2>".$message_display."</h2>";
                    echo "</center>";
                }else{
                   echo "<center><h2>MENAMPILKAN DATA</h2></center>";
                }
            ?>
            <br>
            <input type="button" onclick="location.href='<?php echo 'add_barang'; ?>';" value="Add Barang" />
            <br>
            <br>
            <table border='1' Width='800'>  
                <tr class = "text-center">   
                    <th class = "text-center"> Nomor </th>
                    <th class = "text-center"> Nama Barang</th>
                    <th class = "text-center"> Stock </th>
                    <th class = "text-center"> Harga </th>
                    <th class = "text-center"> Action </th>
                </tr>
                <?php 
                $no = 1;
                foreach ($barang as $list) {
                    
                    echo "<tr>
                    <td align='center'>".$no."</td>
                    <td align='center'>".$list['nama_barang']."</td>
                    <td align='center'>".$list['stock']."</td>
                    <td align='center'>".$list['harga']."</td>
                    <td align='center'> 
                    <a href='edit_barang?id=".$list['id_barang']."'>Edit</a> &nbsp; 
                    <a href='del_barang?id=".$list['id_barang']."'>Remove</a></td>
                    </tr>";
                    $no++;
                }
                ?>
            </table>
            <br>
            <center> 
            <input type="button" onclick="location.href='<?php echo 'index'; ?>';" value="Back" />

        </div>
  
</body>
</html>
