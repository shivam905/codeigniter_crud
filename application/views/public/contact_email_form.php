<html>
<head>    
    <title> Send Email Codeigniter </title>
</head>
<body>
<?php
echo $this->session->flashdata('email_sent');
echo form_open('/Sendingemail_Controller/send_mail');
?>
To Email<input type = "email" name = "toemail" required /><br>
Subject<input type = "text" name = "subject" required /><br>
Message<input type = "textarea" name = "message" required /><br>
<input type = "submit" value = "SEND MAIL">
<?php
echo form_close();
?>
</body>
</html>