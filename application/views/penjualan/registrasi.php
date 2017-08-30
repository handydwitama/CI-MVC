<html>
    <?php
    if (isset($this->session->userdata['logged_in'])) {
        header("location: http://handy.orange.com/CodeIgniter-3.1.5/crud/");
    }
    ?>
<head>
    <title>Registration Form</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>public/mystyle.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="main">
<div id="login">
<h2>Registration Form</h2>
<hr/>
<?php
echo "<div class='error_msg'>";
echo validation_errors();
echo "</div>";
echo form_open('crud/registrasi');

echo form_label('Create Username : ');
echo"<br/>";
echo form_input('username');
echo "<div class='error_msg'>";
if (isset($message_display)) {
echo $message_display;
}
echo "</div>";
echo"<br/>";
echo form_label('Email : ');
echo"<br/>";
$data = array(
'type' => 'email',
'name' => 'email_value'
);
echo form_input($data);
echo"<br/>";
echo"<br/>";
echo form_label('Password : ');
echo"<br/>";
echo form_password('password');
echo"<br/>";
echo form_label('Umur : ');
echo"<br/>";
echo form_input('umur');
echo"<br/>";
echo form_label('Alamat : ');
echo"<br/>";
echo form_input('alamat');
echo"<br/>";
echo"<br/>";
echo form_submit('submit', 'Sign Up');
echo form_close();
?>
<a href="<?php echo 'login'; ?>">For Login Click Here</a>
</div>
</div>
</body>
</html>