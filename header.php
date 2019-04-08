<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sayi education</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="image/fab/favicon.ico">
    <link rel="stylesheet" href="css/style1.csss">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body background-color: #aaa;>
	<header>
  
			
					<?php
						if(isset($_SESSION['uid'])){
							echo '<nav class="navbar nav-pills navbar-expand-sm bg-dark navbar-dark ">
  <a class="navbar-brand" href="index.php">Sayi Education</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto" style="Width:96%">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="report.php">Achivement</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="details.php">Details</a></li>
        <li class="nav-item">
        <a class="nav-link" href="events.php">Events</a></li>
         <li class="nav-item">
            <a class="nav-link" href="about.php">About</a></li>
     </li></ul>
     <ul class="nav navbar-nav navbar-right">
     <li class="nav-item">
    <form class="form-inline " action="include/logout.inc.php" method="post" >
							<button class="btn btn-primary btn-sm" type="submit" name="submit" align=’right’>logout</button>
							</form> </li>    
    </ul>
  </div>  
</nav>';
						}else if(isset($_SESSION['admin'])){
							echo '<nav class="navbar nav-pills nav-fill navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php">Sayi Education</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="database.php">Database</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addcourse.php">Add course</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="addstudent.php">Add student</a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="enter.php">MarksEnter</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="marks.php">ShowMarks</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="details.php">Details</a></li>
        <li class="nav-item">
        <a class="nav-link" href="eventedit.php">Events</a></li>
        <li class="nav-item">
            <a class="nav-link" href="about.php">About</a></li>
      </li>    
    </ul>
   
     <ul class="nav navbar-nav navbar-right">
     <li class="nav-item">
    <form class="form-inline" action="include/logout.inc.php" method="post">
							<button class="btn btn-primary btn-sm" type="submit" name="submit">log out</button>
							</form></li></ul>
  </div>  
</nav>'

;
						}else{
                            
							echo '
				      
                <nav class="navbar nav-pills nav-fill navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php">Sayi Education</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="events.php">Events</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Register.php">Register</a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
        </li>
      </li>    
    </ul>
    
    <ul class="nav navbar-nav navbar-right">
     <li class="nav-item">
    
    <div class="nav-login">
				<form class="form-inline left" action="include/log.inc.php" method="post" >
						<input class="form-control-static btn-sm " type="text" name="username" placeholder="username/e-mail">
						<input class="form-control-static btn-sm" type="password" name="password" placeholder="password">
						<button class="btn btn-primary btn-sm" type="submit" name="submit">log  in</button>
					</form></li></ul>
  </div>  
</nav>';
						}
					?>
    </header>
    
			
    
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>