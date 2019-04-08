<?php include_once 'header.php'; ?>

<div class="main-wrapper">
	<h1>Student DataBase</h1>

	</div>

<div class="container">
<div class="search">
	<form action='database.php' method="post">	
        <input type="text" class="form-control" name="search" placeholder="search"><br>
</form>
</div>


	<h6>Student detail</h6>
    <form action='database.php' method="post">
	<table class="table table-striped table-responsive" >
		<thead>
			<th>Student Id</th>
			<th>Name</th>
			<th>Full name</th>
			<th>Father name</th>
			<th>Mother name</th>
			<th>Father Job</th>
			<th>Address</th>
			<th>Date Of Birth</th>
			<th>D_Id</th>
			<th>Phone Number</th>
		</thead>
		
		<?php include_once 'include/db.inc.php'; 

			$search = @mysqli_real_escape_string($con,$_POST['search']);
			$sql = "SELECT * FROM student_detail  WHERE student_id = '$search'";
			$result = mysqli_query($con,$sql);
			$resultcheck = mysqli_num_rows($result);

		if($resultcheck > 0){
			$query_select = "SELECT * FROM student_detail  WHERE student_id = '$search'";
		}else{ if($search !='')
				echo "<h5>Sorry that student id not exist   Please check the student id</h5>";
				
			$query_select = "SELECT * FROM student_detail ";
		}

		$run_query = mysqli_query($con, $query_select);
        
        $i = 0;
        
		
		while ($result = mysqli_fetch_assoc($run_query)) {
		?>
<tr>
					<td><?php echo "<input class=\"form-control\" type=\"text\"  name=\"student_id$i\" value=\"" . $result['student_id'] . "\">";?></td>
					<td><?php echo "<input class=\"form-control\" type=\"text\"  name=\"name$i\" value=\"".$result['name']."\">";?></td>
					<td><?php echo "<input class=\"form-control\" type=\"text\"  name=\"fullname$i\" value=\"".$result['fullname']."\">";?></td>
					<td><?php echo "<input class=\"form-control\" type=\"text\"  name=\"fathername$i\" value=\"".$result['fathername']."\">";?></td>
					<td><?php echo "<input class=\"form-control\" type=\"text\"  name=\"mothername$i\" value=\"".$result['mothername']."\">";?></td>
					<td><?php echo "<input class=\"form-control\" type=\"text\"  name=\"fatherjob$i\" value=\"".$result['fatherjob']."\">";?></td>
					<td><?php echo "<input class=\"form-control\" type=\"text\"  name=\"address$i\" value=\"".$result['address']."\">";?></td>
					<td><?php echo "<input class=\"form-control\" type=\"text\"  name=\"dob$i\" value=\"".$result['dob']."\">";?></td>
					<td><?php echo "<input class=\"form-control\" type=\"text\"  name=\"departmentid$i\" value=\"".$result['departmentid']."\">";?></td>
					<td><?php echo "<input class=\"form-control\" type=\"text\"  name=\"phonenumber$i\" value=\"".$result['phonenumber']."\">";?></td>
                    <td><?php echo "<button  class=\"btn btn-primary mb-2\" type=\"submit\" name=\"update$i\">Update</button>"; ?>              </td> </tr>

                <?php
                        if(isset($_POST['update'.$i.''])){
                            $student_id = mysqli_real_escape_string($con,$_POST['student_id'.$i.'']);
                            $name = mysqli_real_escape_string($con,$_POST['name'.$i.'']);
                            $fullname = mysqli_real_escape_string($con,$_POST['fullname'.$i.'']);
                            $fathername = mysqli_real_escape_string($con,$_POST['fathername'.$i.'']);
                            $mothername = mysqli_real_escape_string($con,$_POST['mothername'.$i.'']);
                            $fatherjob = mysqli_real_escape_string($con,$_POST['fatherjob'.$i.'']);
                            $address = mysqli_real_escape_string($con,$_POST['address'.$i.'']);
                            $dob = mysqli_real_escape_string($con,$_POST['dob'.$i.'']);
                            $departmentid = mysqli_real_escape_string($con,$_POST['departmentid'.$i.'']);
                            $phonenumber = mysqli_real_escape_string($con,$_POST['phonenumber'.$i.'']);
                            
                            
                            $update = "update student_detail set  name= '$name', fullname = '$fullname', fathername = '$fathername', mothername = '$mothername', fatherjob = '$fatherjob', address = '$address', dob = '$dob', departmentid = '$departmentid', phonenumber = '$phonenumber' where student_id = '$student_id'";
                            $re = mysqli_query($con, $update);
                             @header("Refresh:0");
                           
                        }
                        
        $i++;
        
        }?>
	 

        </table></form><br><br>
    
    
<div class="search">
	<form action='database.php' method="post">	
        <input type="text" class="form-control" name="search1" placeholder="delete student">
        <button  class="btn btn-danger" name="delete">Delete</button>
</form><br>
</div></div>

<?php 
    if(isset($_POST['delete'])){
        $search1 = @mysqli_real_escape_string($con,$_POST['search1']);
        
        if(empty($search1)){
            header("Location:database.php?studentidempty");
		  exit();
        }else{
            $sql = "SELECT * FROM student_detail  WHERE student_id = '$search1'";
			$result = mysqli_query($con,$sql);
			$resultcheck = mysqli_num_rows($result);

		if($resultcheck<=0){
             header("Location:database.php?studentidnotvalids");
		      exit();
            }else{
             $sql = "DELETE FROM student_detail WHERE student_id = '$search1'";
            
			$result = mysqli_query($con,$sql);
            
            $sql = "DELETE FROM user_info WHERE student_id = '$search1'";
            
			$result = mysqli_query($con,$sql);
            
            header("Location:database.php?deletesuccess");
		      exit();
        }
        }
    }
        
        
    
?>

<?php include_once 'footer.php'; ?>