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
            <div id="main">
            <div id="login">
            <h2>Add Barang Baru</h2>
            <hr/>
            <?php
                echo "<div class='error_msg'>";
                echo validation_errors();
                echo "</div>";
                echo form_open('crud/add_barang');

                echo form_label('Nama Barang : ');
                echo"<br/>";
                echo form_input('nama_barang');
                echo "<div class='error_msg'>";
                if (isset($message_display)) {
                    echo $message_display;
                }
                echo "</div>";
                echo"<br/>";
                echo form_label('Stock : ');
                echo"<br/>";
                echo form_input('stock');
                echo"<br/>";
                echo"<br/>";
                echo form_label('Harga : ');
                echo"<br/>";
                echo form_input('harga');
                echo"<br/>";
                echo"<br/>";
                echo form_submit('submit', 'Submit Barang');
                echo form_close();
            ?>
            </div>
            </div>
        </div>
        



</body>
</html>
