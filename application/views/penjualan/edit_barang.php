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
    <title>Edit Barang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
</head>
<body>
        <div class="col-sm-8 text-left"> 
            <div id="main">
            <div id="login">
            <center><h2>Edit Barang</h2></center>
            <hr/>
            <?php echo "<form method='POST' action = 'http://handy.orange.com/CodeIgniter-3.1.5/crud/edit_barang?id=".$id."'>"; ?>
           
            <label>Nama Barang :</label>
            <input type="text" name="nama_barang" id="nama_barang"  value="<?php echo $barang['nama_barang'];?>" >
            <br /><br />        
            <label>Stock :</label>
            <input type="text" name="stock" id="stock" value="<?php echo $barang['stock'];?>" / /><br/><br />
            <label>Harga :</label>
            <input type="text" name="harga" id="harga" value="<?php echo $barang['harga'];?>" / /><br/><br />
            <input type="submit" value=" Submit " name="submit"/><br /><br />
            <?php echo "</form>"; ?>
            </div>
            </div>
        </div>
     
</body>
</html>
