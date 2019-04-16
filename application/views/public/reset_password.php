<?php include('simple_header.php'); ?>

<?php if( $error = $this->session->flashdata('check_password') ): ?>
   
<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 class="alert-heading">Warning!</h4>
  <?php echo $error; ?>
</div>
<?php endif; ?>

<div align="center" style="margin-top: 100px;">
<form action="reset_pass" method="post">

  		<b style="font-size: 20px;">New Password</b> 	
        <input type="text" name="newpass" class="email" required>
        <br><br>

        <b style="font-size: 20px;">Confirm Password</b> 
        <input type="text" name="cpass" class="email" required>
        <br><br>
        
        <input type = "submit" value = "confirm" class="btn btn-info" id="submit">
</form>

</div>

<?php include('public_footer.php'); ?>