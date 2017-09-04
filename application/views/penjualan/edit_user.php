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
            <center><h2>Edit User</h2></center>
            <hr/>
            <?php echo "<form method='POST' action = 'http://handy.orange.com/CodeIgniter-3.1.5/crud/edit_user?id=".$id."'>"; ?>
           
            <label>UserName :</label>
            <input type="text" name="username" id="name"  value="<?php echo $user['nama'];?>" readonly/>
            <br /><br />
            <label>Password :</label>
            <input type="text" name="password" id="password" value="<?php echo $user['password'];?>" / /><br/><br />
            <label>Umur :</label>
            <input type="text" name="umur" id="umur" value="<?php echo $user['Umur'];?>" / /><br/><br />
            <label>Email :</label>
            <input type="text" name="email" id="email" value="<?php echo $user['email'];?>" / /><br/><br />
            <label>Alamat :</label>
            <input type="text" name="alamat" id="alamat" value="<?php echo $user['alamat'];?>" / /><br/><br />
            <input type="submit" value=" Submit " name="submit"/><br /><br />
            <?php echo "</form>"; ?>
            </div>
            </div>
        </div>
        



</body>
</html>
