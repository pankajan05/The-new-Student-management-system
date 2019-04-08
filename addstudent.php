<?php include_once 'header.php'; ?>
<div class="main-wrapper">
	<h1>Add Student</h1>
</div>

<div class="container">
     <h6>Student detail</h6>
	<table class="table table-striped table-responsive" >
		<thead>
            <th>ID</th>
			<th>Name</th>
			<th>Full name</th>
			<th>Father name</th>
			<th>Mother name</th>
			<th>Father Job</th>
			<th>Address</th>
			<th>Date Of Birth</th>
			<th>D_Id</th>
			<th>Phone Number</th>
            <th>Physics</th>
            <th>Chemistry</th>
            <th>Maths</th>
            <th>z-score</th>
            <th>Email</th>
            <th>Other Qualification</th>
		</thead>
        
<?php 
        include_once 'include/db.inc.php';
        
        $sql = "SELECT * FROM register";
        $result = mysqli_query($con,$sql);
        $i = 0;
        
        while ($result1 = mysqli_fetch_assoc($result)) {
         
            echo "<tr>
                <td>".$result1['Register_id']."</td>
                <td>".$result1['name']."</td>
                <td>".$result1['fullname']."</td>
                <td>".$result1['fathername']."</td>
                <td>".$result1['mothername']."</td>
                <td>".$result1['fatherjob']."</td>
                <td>".$result1['address']."</td>
                <td>".$result1['dob']."</td>
                <td>".$result1['department_id']."</td>
                <td>".$result1['phonenumber']."</td>
                <td>".$result1['physics']."</td>
                <td>".$result1['chemistry']."</td>
                <td>".$result1['maths']."</td>
                <td>".$result1['zscore']."</td>
                <td>".$result1['email']."</td>
                <td>".$result1['OtherQualification']."</td>";
            echo "<td><form action='addstudent.php' method=\"post\"><button  class=\"btn btn-primary mb-2\" type=\"submit\" name=\"add$i\">Register</button></form></td></tr>";
                
               if(isset($_POST['add'.$i.''])){
                   
                   $id = 'SE/2016/'.strval($result1['Register_id']);
                   $str = "'$id','".$result1['name']."','".$result1['fullname']."','".$result1['fathername']."','".$result1['mothername']."','".$result1['fatherjob']."','".$result1['address']."','".$result1['dob']."','".$result1['department_id']."','".$result1['phonenumber']."'";
                   
                    $sql = "INSERT INTO student_detail  VALUES ($str)";
                   $result22 = mysqli_query($con,$sql);
                   
                   $h_pass = password_hash($result1['email'],PASSWORD_DEFAULT);
                   $str1 = "'SE/2016/".$result1['Register_id']."','".$result1['name']."','".$result1['email']."','".$h_pass."'";
                   $sql1 = "INSERT INTO user_info VALUES ($str1)";
                   $result2 = mysqli_query($con,$sql1);
                  
                   
                   $rid = $result1['Register_id'];
                   $sql3 = "DELETE FROM register WHERE Register_id=$rid";
                   $result1 = mysqli_query($con,$sql3);
                   @header("Refresh:0");
               }
            
        $i++;
        }
        
        ?>
    
        
    </table>
</div>
<?php include_once 'footer.php'; ?>