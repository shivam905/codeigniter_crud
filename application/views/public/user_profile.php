<?php include('public_header.php'); ?>
  <?php  $profile_id = $this->session->userdata('user_id');?>
  <?php if( $error = $this->session->flashdata('feedback') ): ?>

    <div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 class="alert-heading">Success!</h4>
  <?php echo $error; ?>
</div>
<?php endif; ?>

  <center><br><h2><u>User Profile</u></h2></center>
  <br>
<form name="registration" method="POST" action="<?php echo base_url('user/edit_profile/' . $profile_id); ?>">

  <table cellspacing="2" cellpadding="10"  align="center">
<?php
   foreach ($all_data as $perreq) 
{
    
}
?>
     <tr>
       <td align="right"><b>User Name :</b></td>
       <td><label type="text" name="username" id="t1" value="hiiii"><b><?php echo $perreq->user_name; ?></b></label>
       </td>   
     </tr>
 
<input type="hidden" name="p_id" value="<?php echo $profile_id; ?>"/>
     <tr>
       <td align="right"><b>Email-ID :</b></td>
       <td><label type="email" name="email" value="dfds" placeholder="abc123@xyz.pq" class="email"><b><?php echo $perreq->email; ?></b>
         
       </label>
       </td>
     </tr>
     <tr>
      <td></td>
     <td align="left" >
     
       <input type="submit" value="Edit" class="btn btn-info" align="center">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="button" name="back" class="btn btn-primary" onclick="window.history.back()" value="Back">

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



