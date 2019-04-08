<?php include_once 'header.php' ?>

<div class="main-wrapper">
	<h1>View Marks</h1><br><br>
</div>



<div class="container"><div class="row">

   <div class="col-sm">
       <h3>Available Courses<br><br></h3> <ul>
<?php 
			include_once 'include/db.inc.php';

			$query_select = "select * from courses";
			$run_query = mysqli_query($con, $query_select);
			
		while ($result = mysqli_fetch_assoc($run_query)) {
            echo "<h6><li>".$result['course_id']."(".$result['course_name'].")</li><br></h6>";

	}

		
		?>
       
       </ul></div>
    <div class="col-sm"> 
        <h3>Available Semester<br><br></h3><ul>
<?php 
			include_once 'include/db.inc.php';

			$query_select = "select * from semister";
			$run_query = mysqli_query($con, $query_select);
			
		while ($result = mysqli_fetch_assoc($run_query)) {
            echo "<h6><li>".$result['semester_id']."</li><br></h6>";

	}

		
		?>
       
       </ul>
    </div></div>
    

       

	<form class="form-inline" action="marks.php" method="post">
   <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control"  name="cid" placeholder="Course ID">
  
    <input type="text" class="form-control"  name="sid" placeholder="Semester ID">
  </div> 
    <button type="submit" class="btn btn-primary mb-2" name="search">Enter semester</button></form>	<br><br>
 

    <?php 

if(isset($_POST['search'])){
   
$sid = @mysqli_real_escape_string($con,$_POST['sid']);
$cid = @mysqli_real_escape_string($con,$_POST['cid']);
    
$sql = "SELECT * from courses c,enrollment e,exam x WHERE c.course_id=e.course_id and e.exam_id = x.exam_id and c.course_id = '$cid' and e.semester_id = '$sid'";
$result = mysqli_query($con,$sql);
$resultcheck = mysqli_num_rows($result);

		if($resultcheck <= 0){
			echo "<h5>Sorry that id not exist  or Please check the id</h5>";
		}else{ 
			
            echo" <table class=\"table table-striped table-responsive\" >
		<thead>
			<th>Course Name</th>
			<th>Exam Id</th>
			<th>Student Id</th>
			<th>Marks</th>
			<th>Semester Id</th>
		</thead>";
    
		
		  while ($result1 = mysqli_fetch_assoc($result)) {	
              echo"<tr><td>".$result1['course_name']."</td>
                       <td>".$result1['exam_id']."</td>
                       <td>".$result1['student_id']."</td>
                       <td>".$result1['marks']."</td>
                       <td>".$result1['semester_id']."</td>
                    </tr>";
              echo"</table>";
		  }

        }
}
    

?>

</div>  
<?php include_once 'footer.php' ?>