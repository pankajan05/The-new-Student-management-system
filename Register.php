<?php include_once 'header.php'; ?>

<section class="main-container">
		
		<div id = "container">
		
		<img class="img-responsive" width="100%"  height="30%" src="image/a2.jpeg">
    </div>
</section><br><br>

<div class="main-wrapper">
	<h1>Register</h1>
</div>
<div class="container">
    <h4>Please Fill This Form to Apply For the Degree Program</h4><br><br>
    
    <form action='Register.php' method="post">	
        <div class="input-group">
          <input type="text" name="name" class="form-control" placeholder="Name">
          <input type="text" name="fullname" class="form-control" placeholder="Full name">
            <input type="text" name="dob" class="form-control" placeholder="Date Of Birth dd/mm/yyyy">
        </div> <br>
        <div class="input-group">
          <input type="text" name="fathername" class="form-control" placeholder="Father Name">
          <input type="text" name="fatherjob" class="form-control" placeholder="Father Job">
        </div>
        <input type="text" name="mothername" class="form-control" placeholder="Mother Name"><br>
        
        <div class="input-group">
          <input type="text" name="phonenumber" class="form-control" placeholder="Phone Number">
            <input type="text" name="email" class="form-control" placeholder="Email">
        </div>
        <input type="text" name="address" class="form-control" placeholder="Address"><br>
        
         <div class="input-group">
          <input type="text" name="physics" class="form-control" placeholder="Physics">
            <input type="text" name="chemistry" class="form-control" placeholder="Chemistry">
            <input type="text" name="maths" class="form-control" placeholder="maths">
            <input type="text" name="z" class="form-control" placeholder="Z-score">
        </div><br>
        
        <input type="text" name="other" class="form-control" placeholder="Other Qulification"><br>
        
        <input type="text" name="dp" class="form-control" placeholder="MIT/SE/CS"><br>

        
        <button  class="btn btn-success" name="register">Register</button>
</form>
</div>

<?php 
include_once './include/db.inc.php';

 if(isset($_POST['register'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $fullname = mysqli_real_escape_string($con,$_POST['fullname']);
     $dob = mysqli_real_escape_string($con,$_POST['dob']);
     $fathername = mysqli_real_escape_string($con,$_POST['fathername']);
     $fatherjob = mysqli_real_escape_string($con,$_POST['fatherjob']);
     $mothername = mysqli_real_escape_string($con,$_POST['mothername']);
     $phonenumber = mysqli_real_escape_string($con,$_POST['phonenumber']);
     $email = mysqli_real_escape_string($con,$_POST['email']);
     $address = mysqli_real_escape_string($con,$_POST['address']);
     $physics = mysqli_real_escape_string($con,$_POST['physics']);
     $chemistry = mysqli_real_escape_string($con,$_POST['chemistry']);
     $maths = mysqli_real_escape_string($con,$_POST['maths']);
     $z = $_POST['z'];
     $other = mysqli_real_escape_string($con,$_POST['other']);
     $dp = mysqli_real_escape_string($con,$_POST['dp']);
    
     $sql = "INSERT INTO register(name,fullname,fathername,mothername,fatherjob,address,dob,department_id,phonenumber,physics,chemistry,maths,zscore,email,OtherQualification) VALUES ('$name','$fullname','$fathername','$mothername','$fatherjob','$address','$dob','$dp','$phonenumber','$physics','$chemistry','$maths','$z','$email','$other')";
     
     $result = mysqli_query($con,$sql);
    
    
     include_once 'footer.php';
 }
?>