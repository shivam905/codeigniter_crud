<?php include('simple_header.php'); ?>
<style type="text/css">
	
	table {
    border-collapse: collapse;
}

td {
    padding-top: .5em;
    padding-bottom: .5em;
}

</style>

<?php if( $error = $this->session->flashdata('register') ): ?>

  <div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 class="alert-heading">Congratulations</h4>
  <?php echo $error; ?>
</div>
<?php endif; ?>


<?php 
@$list=explode(',',$_COOKIE['data']);

if(is_null($list))

?>
<?php if( $error = $this->session->flashdata('login failed') ): ?>
   
<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 class="alert-heading">Warning!</h4>
  <?php echo $error; ?>
</div>
<?php endif; ?>
<center><br><br><br><h1><u>Login Form</u></h1></center>
<div align="center">
<?php echo form_open('login/user_login',['class'=>'user_login']); ?>


  <table style="margin-top: 60px;" cellpadding="15px" border="2">
  	<tr>
  		<td><b style="font-size: 20px;">User Name :</b></td>
  		<td height="80" >

        <input type="text" name="username" class="email" placeholder="User Name" <?php echo "value='".@$list[0]."'"; ?>>
<!-- 
        <?php //echo form_input(['name'=>'username','class'=>'email','type'=>'text','placeholder'=>'User Name',
      //'value'=>'".@$list[0]."']);?> -->

  		<b style="font-size:15px; position:fixed;"><?php echo form_error('username');?></b></td>
  	</tr>

   
  	<tr>
  		<td><b style="font-size: 20px;">Password :</b></td>
  		<td height="80"><input type="password" name="password" placeholder="Password" <?php echo "value='".@$list[1]."'"; ?>>
  			<b style="font-size: 15px; position: fixed;"><?php echo form_error('password');?></b></td>		
  	</tr>

    <tr>
      <td></td>
      <td><input type="checkbox" name="rememberme" value="1"><b style="font-size: 20px;"> &nbsp; Remember Me </b>
        </td>     
    </tr>
    
  	<tr>
      <td>
  <a style="font-size: 20px;" href="<?php echo site_url('login/forget_password') ?>">Forget <br>Password ?</a>
      </td>
  		<td height="80"><button type="submit" class="btn btn-success" id="submit">Login</button>
  		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  		<?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-primary','type'=>'button']);?></td>
  	</tr>
  </table><br>
  <b style="font-size: 20px;">Create Account =>
  <a style="font-size: 20px;" href="<?php echo site_url('login/user_registration') ?>"><u>Click Here</u></a></b>
</form>
</div>

<?php include('public_footer.php'); ?>