<?php include_once 'header.php'; 

include_once 'include/db.inc.php';

 if(isset($_POST['add'])){
      $course_name = mysqli_real_escape_string($con,$_POST['cname']) || "";
      $course_id = mysqli_real_escape_string($con,$_POST['cid']) || "";
      $description = mysqli_real_escape_string($con,$_POST['description']) || "";
     
     if($course_name == '' || $course_id =='' || $description=='');
     else{
    $sql = "INSERT INTO courses(course_name, course_id, describtion) VALUES ('$course_name', '$course_id', '$description')";
     @$result = mysqli_query($con,$sql);
     @header("Refresh:0");
     }
 }

if(isset($_POST['adds'])){
      $semester_id = mysqli_real_escape_string($con,$_POST['semester_id']);
      $start = mysqli_real_escape_string($con,$_POST['start']);
      $end = mysqli_real_escape_string($con,$_POST['end']);
      $name = mysqli_real_escape_string($con,$_POST['name']);
     
     if($semester_id == '' || $start =='' || $end=='' || $name=='');
     else{
    $sql = "INSERT INTO semister(semester_id, semester_start, semester_end, semester) VALUES ('$semester_id', '$start', '$end', '$name')";
     @$result = mysqli_query($con,$sql);
          @header("Refresh:0");
     }
 }

 if(isset($_POST['dc'])){
     $course_id = mysqli_real_escape_string($con,$_POST['cid']);
     
     $sql = "UPDATE courses SET Available = false WHERE course_id = '$course_id'";
     $result = mysqli_query($con,$sql);
     @header("Refresh:0");
 }

 if(isset($_POST['ac'])){
     $course_id = mysqli_real_escape_string($con,$_POST['cid']);
      
     $sql = "UPDATE courses SET Available = true WHERE course_id = '$course_id'";
     $result = mysqli_query($con,$sql);
     @header("Refresh:0");
 }
    
 if(isset($_POST['ds'])){
     $course_id = mysqli_real_escape_string($con,$_POST['sid']);
     
      $sql = "UPDATE semister SET Available = false WHERE semester_id = '$course_id'";
     $result = mysqli_query($con,$sql);
     @header("Refresh:0");
 }

 if(isset($_POST['as'])){
     $course_id = mysqli_real_escape_string($con,$_POST['sid']);
     
      $sql = "UPDATE semister SET Available = true WHERE semester_id = '$course_id'";
     echo $sql;
     $result = mysqli_query($con,$sql);
     @header("Refresh:0");
 }?>





<div class="main-wrapper">
	<h1>Add Course</h1><br>
</div>

<div class="container">
    <h4>Create New Course</h4><br><br>
    
    <form action='addcourse.php' method="post">	
     
    <input type="text" name="cname" class="form-control" placeholder="Course Name"><br>
    <input type="text" name="cid" class="form-control" placeholder="Course ID"><br>
    <div class="form-group">
    <textarea class="form-control" name="description" rows="3" placeholder="Course Description"></textarea>
  </div><br>

        <button  class="btn btn-success" name="add">Add course</button><br><br><br></form>
    
    <h4>Add New Semester</h4><br><br>
    
     <form action='addcourse.php' method="post">	   
    
    <input type="text" name="semester_id" class="form-control" placeholder="Semester Id"><br>
    <input type="text" name="start" class="form-control" placeholder="Semester End"><br>
    <input type="text" name="end" class="form-control" placeholder="Semester Start"><br>
    <input type="text" name="name" class="form-control" placeholder="Semester Name"><br>
    <button  class="btn btn-success" name="adds">Add Semester</button><br><br><br>
    </form>
    
    <h3 class="text-right text-justify ">Available Courses<br><br></h3>
    <ul  class="text-center text-justify list-group">
<?php 
			

			$query_select = "SELECT * from courses";
			$run_query = mysqli_query($con, $query_select);
			
		while ($result = mysqli_fetch_assoc($run_query)) {
            if($result['Available'] == true){
                $act = "active";
            }
            else{
                $act="";
            }
            echo "<li class=\"list-group-item ".$act."\">".$result['course_id']."(".$result['course_name'].")</li>";

	}
		
		?>
        </ul><br><br><br>
    
    <h3 class="text-right text-justify ">Available Semester<br><br></h3>
    
    <ul  class="text-center text-justify list-group">
<?php 
			include_once 'include/db.inc.php';

			$query_select1 = "SELECT * from semister";
			$run_query1 = mysqli_query($con, $query_select1);
			
		while ($result1 = mysqli_fetch_assoc($run_query1)) {
            if($result1['available'] == true){
                $act = "active";
            }
            else{
                $act="";
            }
            echo "<li class=\"list-group-item ".$act."\">".$result1['semester_id']."(".$result1['semester_start']."->".$result1['semester_end'].")</li>";

	}
		
		?>
        </ul><br><br><br>
    
 
     <h4 class="text-right">Make Available</h4><br><br>
        <form action='addcourse.php' method="post">
            
<div class="input-group mb-3">
  <input type="text" class="form-control" name ="cid" placeholder="Course Id">
    <button class="btn btn btn-success" name = "ac"> Active</button>
    <button class="btn btn-danger" name = "dc" >Deactive</button>
  </div>
            
    
<div class="input-group mb-3">
  <input type="text" class="form-control" name ="sid" placeholder="Semester Id">
    <button class="btn btn-success" name = "as" >Active</button>
    <button class="btn btn-danger" name = "ds" >Deactive</button>
  </div>

    </form>
</div>



<?php
include_once 'footer.php'; ?>