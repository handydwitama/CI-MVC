<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
    header("location: http://handy.orange.com/CodeIgniter-3.1.5/crud");
}
?>
<head>
    <title>Login</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>public/mystyle.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
    <?php
        if (isset($logout_message)) {
            echo "<div class='message'>";
            echo $logout_message;
            echo "</div>";
        }
    ?>
    <?php
        if (isset($message_display)) {
            echo "<div class='message'>";
            echo $message_display;
            echo "</div>";
        }
    ?>
    <div id="main">
    <div id="login">
    <h2>Login</h2>
    <hr/>
    <?php echo "<form method='POST' action = 'http://handy.orange.com/CodeIgniter-3.1.5/crud/login'>"; ?>
    <?php
        echo "<div class='error_msg'>";
        if (isset($error_message)) {
        echo $error_message;
        }
        echo validation_errors();
        echo "</div>";
    ?>
    <label>UserName :</label>
    <input type="text" name="username" id="name" placeholder="username"/><br /><br />
    <label>Password :</label>
    <input type="password" name="password" id="password" placeholder="**********"/><br/><br />
    <input type="submit" value=" Login " name="submit"/><br /><br />
    <a href="<?php echo 'registrasi'; ?>">To SignUp Click Here</a>
    <?php echo "</form>"; ?>
    </div>
    </div>
</body>
</html>