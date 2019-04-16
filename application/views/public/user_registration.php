<?php include('simple_header.php'); ?>

<?php if( $error = $this->session->flashdata('register') ): ?>

  <div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 class="alert-heading">Warning!</h4>
  <?php echo $error; ?>
</div>
<?php endif; ?>

  <center><br><h2><u>Registration Form</u></h2></center>
  <br>
<form name="registration" method="POST" action="<?php echo site_url('registration/add_new_user');?>" >

  <table cellspacing="2" cellpadding="10"  align="center">
    
     <tr>
       <td align="right"><b>User Name :</b></td>
       <td><input type="text" name="username" id="t1" value="<?php echo set_value('username'); ?>" class="email" >
        <b style="font-size:15px; position:fixed; margin-left: 10px"><?php echo form_error('username');?></b></td>   
     </tr>

     <tr>
       <td align="right"><b>Email-ID :</b></td>
       <td><input type="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="abc123@xyz.pq" class="email">
        <b style="font-size:15px; position:fixed; margin-left: 10px"><?php echo form_error('email');?></b></td>
     </tr>

     <tr>
       <td align="right"><b>Password :</b></td>
       <td><input type="password" name="password" class="email" value="<?php echo set_value('password'); ?>">
        <b style="font-size:15px; position:fixed; margin-left: 10px"><?php echo form_error('password');?></b></td>
     </tr>

     <tr>
       <td align="right"><b>Confirm Password :</b></td>
       <td><input type="password" name="cpassword" class="email" value="<?php echo set_value('cpassword'); ?>">
        <b style="font-size:15px; position:fixed; margin-left: 10px"><?php echo form_error('cpassword');?></b></td>
     </tr>

     <tr>
      <td></td>
     <td align="left" >
     
       <input type="submit" value="Submit" align="center">

       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="reset">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="button" name="back" onclick="window.history.back()" value="back">

    </td></tr>
</tr></table>
</form>

<script type="text/javascript">
  $(document).ready(function () {
    $("#dialog").dialog({ autoOpen: false, modal: true, height: 590, width: 1005 });

            $("#OpenDialog").click(function () {
                $("#dialog").dialog('open');
            });
        });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>
</html>



