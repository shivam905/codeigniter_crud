<!DOCTYPE html>
<html>
<head>
  <title>header</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
  .topnav-right {
  float: right;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?php echo site_url("login/user_login"); ?>">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" id="menu">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
    <a class="nav-link nav-item " href="<?php echo site_url('login/user_registration') ?>">SignUp</a>
  </li>
</ul>
  </div>

</nav>
<script type="text/javascript">

  $(document).ready(function(){
    $("#menu").click(function(){
        $("#navbarColor01").toggle()
        $("#search_form").toggle();
    });
});


</script>