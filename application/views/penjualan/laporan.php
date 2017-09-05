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

    <br><br>
        <div class="col-sm-8 text-left"> 
            <div class="type-2">
                <div>
                    <a href="http://handy.orange.com/CodeIgniter-3.1.5/crud/laporan/user" class="btn btn-1">
                    Laporan By User
                    <span class="round"><i class="fa fa-chevron-right"></i></span>
                    </a>
                </div>
                <br>
                <br>
                <br>   
                <div>
                    <a href="http://handy.orange.com/CodeIgniter-3.1.5/crud/laporan/date" class="btn btn-2">
                    Laporan By Tanggal
                    <span class="round"><i class="fa fa-chevron-right"></i></span>
                    </a>
                </div>                
            </div>
        </div>
        



</body>
</html>
