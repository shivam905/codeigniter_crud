<?php include('admin_header.php'); ?>

<div class="container" align="center">
  <br>
  <h1><u>Add Article</u></h1>
<?php echo form_open_multipart('admin/store_article',['class'=>'user_login']); ?>
<?php echo form_hidden('user_id',$this->session->userdata('user_id')); ?>


  <table style="margin-top: 10px;" cellpadding="15px">
    <tr>

      <td><b style="font-size: 20px;">Article Image:</b></td>
      <td height="80" ><?php echo form_upload(['name'=>'userfile','class'=>'email']);?>

      <?php if(isset($upload_error)) echo $upload_error;?>
   


      <td><b style="font-size: 20px;">Article Title :</b></td>
      <td height="80" ><?php echo form_input(['name'=>'title','class'=>'email','type'=>'text','placeholder'=>'Article Title','value'=>set_value('title')]);?>

      <b style="font-size:15px; position:fixed;"><?php echo form_error('title');?></b></td>
    </tr>
    <tr>
      <td><b style="font-size: 20px;">Article Body :</b></td>
      <td height="80"><textarea type="textarea" name="body" placeholder="Article Body" rows="4" cols="22"></textarea> 
        <b style="font-size: 15px; position: fixed;"><?php echo form_error('body');?></b></td>
      
    </tr>
    <tr><td></td>
      <td height="80"><button type="submit" class="btn btn-success" id="submit">Add Article</button>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-primary','type'=>'button']);?></td>
    </tr>
  </table>
</form>
</div>
 
<?php include('admin_footer.php'); ?>