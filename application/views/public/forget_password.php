<?php include('simple_header.php'); ?>



<div align="center" style="margin-top: 100px;">
<form action="send_mail" method="post">
  		<b style="font-size: 20px;">Enter Your Valid Email-ID :</b><br><br>
  	

        <input type="email" name="toemail" class="email" placeholder="example@gmail.com"><br>
        <b style="font-size:15px; position:relative;"><?php echo $this->session->flashdata('email_sent'); ?></b>
        <br><br>
        
        <input type = "submit" value = "SEND MAIL" class="btn btn-success" id="submit"><br><br>      
</form>

</div>

<?php include('public_footer.php'); ?>