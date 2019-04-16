<?php include('public_header.php'); ?>


<?php if( $error = $this->session->flashdata('feedback') ): ?>

		<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 class="alert-heading">Warning!</h4>
  <?php echo $error; ?>
</div>
<?php endif; ?>

<?php $profile_id = $this->session->userdata('user_id'); ?>
<div class="container" align="center">

  <br>
  <h1><u>Edit User Profile</u></h1>
  <?php echo form_open("user/update_profile/". $profile_id,['class'=>'user_login']); ?>


  <table style="margin-top: 10px;" cellpadding="15px">
    <tr>
      <td><b style="font-size: 20px;">Change User Name:</b></td>
      <td height="80" ><?php echo form_input(['name'=>'username','class'=>'email','type'=>'text','placeholder'=>'Article Title','value'=>set_value('username', $profile->user_name)]);?>

      <b style="font-size:15px; position:fixed;"><?php echo form_error('username');?></b></td>
    </tr>
    <tr>
      <td><b style="font-size: 20px;">Change Email-ID:</b></td>
      <td height="80"><?php echo form_textarea(['name'=>'email','rows'=>'4','cols'=>'22','type'=>'textarea','placeholder'=>'Article Body',
       'value'=>set_value('email', $profile->email)]);?>
        <!-- <textarea type="textarea" name="body" placeholder="Article Body" rows="3" cols="22"></textarea>  -->
        <b style="font-size: 15px; position: fixed;"><?php echo form_error('email');?></b></td>
      <input type="hidden" name="p_id" value="<?php echo $profile_id; ?>"/>
    </tr>
    <tr><td></td>
      <td height="80"><button type="submit" class="btn btn-danger" id="submit">Update</button>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php echo form_reset(['name'=>'reset','value'=>'Back','class'=>'btn btn-primary','type'=>'button','onclick'=>'window.history.back()' ]);?></td>
    </tr>
  </table>
</form>
</div>
 
<?php include('public_footer.php'); ?>



