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
            <h1>Welcome</h1>
            <p><?php echo "Selamat Datang : ".$username; ?></p>
            <br>
            <br>
            <button onclick = "location.href='<?php echo 'buy'; ?>';">Mulai Pembelian</button>
        </div>
        



</body>
</html>
