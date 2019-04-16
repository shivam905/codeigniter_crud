<!DOCTYPE html>

<html>
<head>
	<title>register captcha</title>
</head>
<body>

	<h1> Captcha Checking Demo</h1>
	<center><div class="container">
<form action=register.php method="post">
	Name : <input type="text" name="name">
	
	<?php
session_start();

if(isset($_POST['check']))
{
	$code = $_SESSION['cap_code'];

	$user = $_POST['cap'];

	if($code === $user)
	{
		echo "code verify";
	}
	else
		echo "invalid captcha";
}

?><br><br>
<img src="captcha.php" style="margin-left: 90px;">
<br>
	Captcha <input type="text" name="cap">
<br><br>
	<input type="submit" name="check" value="Verify" style="margin-left: 90px;">

</form>
</div></center>
</body>
</html>