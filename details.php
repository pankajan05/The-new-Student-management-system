<?php include_once 'header.php'; ?>

<div class="main-wrapper">
	<h1>User Details</h1>

	</div>


<div class="container">
    <br><br><br>
<form class="form-inline" action="include/update.inc.php" method="post">
  <div class="form-group mb-2">
       <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="User Name:">
  </div>
   <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control" id="inputPassword2" name="uname" placeholder="<?php  echo $_SESSION['uname']; ?>">
  </div> 
    <button type="submit" class="btn btn-primary mb-2" name="buname">change</button></form><br><br>
	
<form class="form-inline" action="include/update.inc.php" method="post">
	<div class="form-group mb-2">
       <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Student ID:">
  </div>
   <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control" id="inputPassword2" name="student_id" placeholder="<?php  
			if(isset($_SESSION['admin']))
				echo $_SESSION['admin'];  
			else 
				echo $_SESSION['uid'];
	?>">
    </div> </form><br><br>
    		
<form class="form-inline" action="include/update.inc.php" method="post">
  <div class="form-group mb-2">
       <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Email:">
  </div>
   <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control" id="inputPassword2" name="email" placeholder="<?php  echo $_SESSION['email']; ?>">
  </div> 
    <button type="submit" class="btn btn-primary mb-2" name="bemail">change</button></form>	<br><br>
	
    
<form class="form-inline" action="include/update.inc.php" method="post">
  <div class="form-group mb-2">
       <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Password:">
  </div>
   <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control" id="inputPassword2" name="password" placeholder=" Enter new password">
  </div> 
    <button type="submit" class="btn btn-primary mb-2" name="bpassword">change</button></form>	<br><br>
	


</div>

<?php include_once 'footer.php'; ?>