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
            <table border='1' Width='800'>  
                <tr class = "text-center">   
                    <th class = "text-center"> Nomor </th>
                    <th class = "text-center"> Nama </th>
                    <th class = "text-center"> Password </th>
                    <th class = "text-center"> Email </th>
                    <th class = "text-center"> Umur </th>
                    <th class = "text-center"> Alamat </th>
                    <th class = "text-center"> Action </th>
                </tr>
                <?php 
                $no = 1;
                foreach ($user as $list) {
                    $pwd = md5($list['password']);
                    echo "<tr>
                    <td align='center'>".$no."</td>
                    <td align='center'>".$list['nama']."</td>
                    <td align='center'>".$list['password']."</td>
                    <td align='center'>".$list['email']."</td>
                    <td align='center'>".$list['Umur']."</td>
                    <td align='center'>".$list['alamat']."</td>
                    <td align='center'><a href='detail_user?id=".$list['id']."'>View</a> &nbsp; 
                    <a href='edit_user?id=".$list['id']."'>Edit</a> &nbsp; 
                    <a href='del_user?id=".$list['id']."'>Remove</a></td>
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
