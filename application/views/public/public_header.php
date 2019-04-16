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
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" id="menu">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('user/index') ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("user/profile_data"); ?>">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>  
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
    <a class="nav-link nav-item " href=" <?php echo base_url("login/logout"); ?>">Logout</a>
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



<!-- <form class="form-inline my-2 my-lg-0" id="search_form">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form> -->