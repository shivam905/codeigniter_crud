<?php include('simple_header.php'); ?>

<?php
echo $this->session->flashdata('check_otp');

?>

<div align="center" style="margin-top: 100px;">
<form action="confirm_otp" method="post">
  		<b style="font-size: 20px;">Enter OTP :</b><br><br>  	

        <input type="text" name="otp" class="email" required>
        <br><br>
        
        <input type = "submit" value = "confirm" class="btn btn-danger" id="submit"><br><br>

        <b>Did not recieve OTP ?</b> <a href="forget_password">Click Here</a> 
</form>

</div>

<?php include('public_footer.php'); ?>